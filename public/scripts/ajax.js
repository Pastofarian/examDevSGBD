$(document).ready(function () {
    //les différents boutons qui font une requete XHR ont tous la classe "xhr" ainsi qu'une classe correspondant à l'action (edit/create/show/destroy);
    $('body').on('click', 'button.xhr', function () {
        let id = $(this).attr('_id');
        if ($(this).hasClass('edit')) {
            return edit(id);
        } else if ($(this).hasClass('create')) {
            return create();
        } else if ($(this).hasClass('show')) {
            return show(id);
        }
        return destroy(id);
    });

    //on ecoute le submit de form pour l'intercepter et le traiter en JS
    $('body').on('submit', 'form', function (e) {
        e.preventDefault();
        if ($(this).hasClass('update')) {
            return update($(this));
        }
        return store($(this));
    });

    function show(id) {
        $.get("/animals/" + id).done(function (result) {
            $('.content').html(result);
        }).fail(function (err) {
            console.warn('error in show', err);
        });
    }

    function edit(id) {
        $.get("/animals/" + id + "/edit").done(function (result) {
            $('.content').html(result);
        }).fail(function (err) {
            console.warn('error in edit', err);
        });
    }

    function create() {
        $.get("/animals/create").done(function (result) {
            $('.content').html(result);
        }).fail(function (err) {
            console.warn('error in create', err);
        });
    }

    function destroy(id) {
        $.post("/animals/" + id + "/destroy").done(function (result) {
            $('.content').html(result);
        }).fail(function (err) {
            console.warn('error in destroy', err);
        });
    }

    function update($form) {
        let name = $form.find('input[name="name"]').val();
        let type = $form.find('input[name="type"]').val();
        let age = $form.find('input[name="age"]').val();
        let id = $form.find('input[name="id"]').val();
        $.post('/animals/' + id + '/update', { name: name, type: type, age: age, id: id }).done(function (result) {
            $('.content').html(result);
        }).fail(function (err) {
            console.warn('error in update', err);
        });
    }

    function store($form) {
        let name = $form.find('input[name="name"]').val();
        let type = $form.find('input[name="type"]').val();
        let age = $form.find('input[name="age"]').val();
        $.post('/animals', { name: name, type: type, age: age }).done(function (result) {
            $('.content').html(result);
        }).fail(function (err) {
            console.warn('error in store', err);
        });
    }
});
