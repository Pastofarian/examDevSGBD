$(document).ready(function () {
    $("body").on("click", "button.xhr", function () {
        let id = $(this).attr("_id");
        if ($(this).hasClass("edit")) {
            return edit(id);
        } else if ($(this).hasClass("create")) {
            return create();
        } else if ($(this).hasClass("show")) {
            return show(id);
        }
        return destroy(id);
    });

    $("body").on("submit", "form", function (e) {
        e.preventDefault();
        if ($(this).hasClass("update")) {
            return update($(this));
        }
        return store($(this));
    });

    function show(id) {
        $.get("/owners/" + id)
            .done(function (result) {
                $(".content").html(result);
            })
            .fail(function (err) {
                console.warn("error in show", err);
            });
    }

    function edit(id) {
        $.get("/owners/" + id + "/edit")
            .done(function (result) {
                $(".content").html(result);
            })
            .fail(function (err) {
                console.warn("error in edit", err);
            });
    }

    function create() {
        $.get("/owners/create")
            .done(function (result) {
                $(".content").html(result);
            })
            .fail(function (err) {
                console.warn("error in create", err);
            });
    }

    function destroy(id) {
        $.post("/owners/" + id + "/destroy")
            .done(function (result) {
                $(".content").html(result);
            })
            .fail(function (err) {
                console.warn("error in destroy", err);
            });
    }

    function update($form) {
        let first_name = $form.find('input[name="first_name"]').val();
        let last_name = $form.find('input[name="last_name"]').val();
        let birth_date = $form.find('input[name="birth_date"]').val();
        let email = $form.find('input[name="email"]').val();
        let phone = $form.find('input[name="phone"]').val();
        let id = $form.find('input[name="id"]').val();

        $.post("/owners/" + id + "/update", {
            id: id,
            first_name: first_name,
            last_name: last_name,
            birth_date: birth_date,
            email: email,
            phone: phone,
        })
            .done(function (result) {
                $(".content").html(result);
            })
            .fail(function (err) {
                console.warn("error in update", err);
            });
    }

    function store($form) {
        let first_name = $form.find('input[name="first_name"]').val();
        let last_name = $form.find('input[name="last_name"]').val();
        let birth_date = $form.find('input[name="birth_date"]').val();
        let email = $form.find('input[name="email"]').val();
        let phone = $form.find('input[name="phone"]').val();

        $.post("/owners", {
            first_name: first_name,
            last_name: last_name,
            birth_date: birth_date,
            email: email,
            phone: phone,
        })
            .done(function (result) {
                $(".content").html(result);
            })
            .fail(function (err) {
                console.warn("error in store", err);
            });
    }
});
