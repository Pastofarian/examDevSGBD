<?php
// class Router {
//     private $routes = [];

//     public function __construct() {
//         // Defini les routes
//         $this->addRoute('/', 'AnimalController', 'index');
//         $this->addRoute('/animals/{id}', 'AnimalController', 'show');
//         $this->addRoute('/animals/{id}/edit', 'AnimalController', 'edit');
//         $this->addRoute('/animals/create', 'AnimalController', 'create');
//         $this->addRoute('/animals/{id}/destroy', 'AnimalController', 'destroy');
//         $this->addRoute('/animals/{id}/update', 'AnimalController', 'update');
//         $this->addRoute('/animals', 'AnimalController', 'store');
        

//         // Récupère l'URI et dispatch la requête
//         $request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//         $this->dispatch($request_uri);
//     }

//     public function addRoute($route, $controller, $method) {
//         $this->routes[$route] = ['controller' => $controller, 'method' => $method];
//     }

//     public function getRoute($route) {
//         return isset($this->routes[$route]) ? $this->routes[$route] : null;
//     }

//     // Dispatch la requête avec l'URI en paramètre
//     public function dispatch($request_uri) {
//         // Récupère les données POST si elles existent
//         $post_data = $this->getPostData();

//         // Extrait les parties de l'URI
//         $uri_parts = $this->getUriParts($request_uri);

//         foreach ($this->routes as $route => $params) {
//             $route_parts = $this->getRouteParts($route);

//             // Continue si route et URI sont différentes
//             if (!$this->partsCountMatch($route_parts, $uri_parts)) {
//                 continue;
//             }

//             // Récupère les valeurs paramètres dans URI dynamiquement
//             $param_values = $this->getParamsValues($route_parts, $uri_parts);

//             // Continue si partie statique route est diffèrente de l'URI
//             if ($param_values === false) {
//                 continue;
//             }

//             // Si on est arrivé ici c'est que les routes matches, donc on appelle la méthode du contrôleur
//             if ($this->callControllerMethod($params, $param_values, $post_data)) {
//                 return;
//             }
//         }

//         // Si aucune route ne correspond, on affiche une erreur 404
//         echo "404 Not Found";
//     }

//     // Récupère les données POST si elles existent
//     private function getPostData() {
//         return ($_SERVER['REQUEST_METHOD'] == 'POST') ? $_POST : [];
//     }

//     // Extrait les parties de l'URI
//     private function getUriParts($request_uri) {
//         return explode('/', $request_uri);
//     }

//     // Extrait les parties de la route
//     private function getRouteParts($route) {
//         return explode('/', $route);
//     }

//     // Vérifie si le nombre de parties dans la route et l'URI correspondent
//     private function partsCountMatch($route_parts, $uri_parts) {
//         return count($route_parts) == count($uri_parts);
//     }

//     // Extrait les valeurs dynamiquement de l'URI
//     private function getParamsValues($route_parts, $uri_parts) {
//         $param_values = [];
//         for ($i = 0; $i < count($route_parts); $i++) {
//             if ($this->isDynamicPart($route_parts[$i])) {
//                 $param_values[] = $uri_parts[$i];
//             } elseif ($route_parts[$i] != $uri_parts[$i]) {
//                 return false;
//             }
//         }

//         return $param_values;
//     }

//     // Vérifie si une partie de la route est dynamique -> {}
//     private function isDynamicPart($part) {
//         return strpos($part, '{') === 0 && strpos($part, '}') === strlen($part) - 1;
//     }

//     // Appelle la méthode du contrôleur correspondant à la route
//     private function callControllerMethod($params, $param_values, $post_data) {
//         $controller = new $params['controller'];
//         $method = $params['method'];

//         if (!method_exists($controller, $method)) {
//             echo "404 Not Found - Method {$method} not found in controller {$params['controller']}";
//             return false;
//         }

//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             call_user_func_array([$controller, $method], array_merge($param_values, [$post_data]));
//         } else {
//             call_user_func_array([$controller, $method], $param_values);
//         }

//         return true;
//     }
// }
class Router {
    
    private $data;
    private $url;
    private $post;
    private $get;
    private $controller = false;
    private $routes;
    private $action = false;
    private $actions;
    private $id = false;
    
    public function __construct ($url) {
        $this->url = $url;
        $this->post = $_POST;
        $this->get = $_GET;
        $this->data = count($this->post) ? $this->post : $this->get;
        
        //tableau associatif pour définir une correspondance URL <-> Controller
        $this->routes = [
            "/" => "AnimalController",
            "animals" => "AnimalController"
            //"teachers" => "TeacherController"
        ];
        
        //liste des actions autorisées
        $this->actions = ["index", "show", "create", "store", "edit", "update", "destroy"];
        
        $this->analyze(); 
        //$this->debug();
        $this->run();
    }
    
    private function analyze () {
        $this->clean_url();
        
        //Si pas de controlleur on part sur une 404
        if (!$this->detect_controller()) {
            http_response_code(404);
            var_dump('Not found');
            die();
        }
        
        
        if ($this->detect_id()) {
            array_shift($this->url); 
        }
        
        $this->detect_action();
        
        if ($this->action == "index" && $this->id) {
            $this->action = "show";
        } else if ($this->action == "index" && !empty($_POST)) {
            $this->action = "store";
        }
    }
    
    private function clean_url () {
        //J'enleve tout ce qui se trouve après le "?" S'il y en a un dans l'URL
        if (strpos($this->url, "?")) {
            $this->url = strstr($this->url, '?', true);
        }
        //Je transforme la string de l'url en un tableau, le substr me permet de virer le premier /
        $this->url = explode("/", substr($this->url, 1));
    }
    
    private function detect_controller () {
        //var_dump("Detecte controller URL ", $this->url);
        //si je n'ai rien dans mon tableau a l'index 0 ou si cest une valeur numérique => controlleur par défaut
        if (!$this->url[0] || is_numeric($this->url[0])) {
            return $this->controller = $this->routes["/"];
        }
        
        //si dans mon tableau route j'ai une equivalence, je l'utilise
        if (isset($this->routes[$this->url[0]])) {
            $this->controller = $this->routes[$this->url[0]];
            //l'array shift vire le premier elem de mon tableau car plus besoin
            array_shift($this->url);
            return true;
        }
        return false;
    }
    
    private function detect_id () {
        if (isset($this->url[0])) {
            if(is_numeric($this->url[0])) {
                return $this->id = $this->url[0];
            }
        }
        return false;
    }
    
    private function detect_action () {
        if (isset($this->url[0]) && $this->url[0]) {
            //je verifie si l'action existe dans mon URL
            if(!in_array($this->url[0], $this->actions)) {
                return false;
            }
            return $this->action = $this->url[0];
        }
        return $this->action = "index";
    }
    
    private function run () {
        $this->controller = new $this->controller();
        if ($this->id && !$this->data) {
            return $this->controller->{$this->action}($this->id);
        } else if (!$this->id && $this->data) {
            $this->controller->{$this->action}($this->data);
        }
        return $this->controller->{$this->action}($this->id, $this->data);
    }
    
    private function debug () {
        var_dump($this->controller, $this->id, $this->action);
    }
    
    
}