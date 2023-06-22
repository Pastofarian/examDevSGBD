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
        $.get("/stays/" + id)
            .done(function (result) {
                $(".content").html(result);
            })
            .fail(function (err) {
                console.warn("error in show", err);
            });
    }

    function edit(id) {
        $.get("/stays/" + id + "/edit")
            .done(function (result) {
                $(".content").html(result);
            })
            .fail(function (err) {
                console.warn("error in edit", err);
            });
    }

    function create() {
        $.get("/stays/create")
            .done(function (result) {
                $(".content").html(result);
            })
            .fail(function (err) {
                console.warn("error in create", err);
            });
    }

    function destroy(id) {
        $.post("/stays/" + id + "/destroy")
            .done(function (result) {
                $(".content").html(result);
            })
            .fail(function (err) {
                console.warn("error in destroy", err);
            });
    }

    function update($form) {
        let start_date = $form.find('input[name="start_date"]').val();
        let end_date = $form.find('input[name="end_date"]').val();
        let animal_id = $form.find('select[name="animal_id"]').val();
        let id = $form.find('input[name="id"]').val();

        $.post("/stays/" + id + "/update", {
            id: id,
            start_date: start_date,
            end_date: end_date,
            animal_id: animal_id,
        })
            .done(function (result) {
                $(".content").html(result);
            })
            .fail(function (err) {
                console.warn("error in update", err);
            });
    }

    function store($form) {
        let start_date = $form.find('input[name="start_date"]').val();
        let end_date = $form.find('input[name="end_date"]').val();
        let animal_id = $form.find('select[name="animal_id"]').val();

        $.post("/stays", {
            start_date: start_date,
            end_date: end_date,
            animal_id: animal_id,
        })
            .done(function (result) {
                $(".content").html(result);
            })
            .fail(function (err) {
                console.warn("error in store", err);
            });
    }
});
