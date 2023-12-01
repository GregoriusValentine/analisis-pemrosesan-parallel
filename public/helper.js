const Ajax = {
    get: (a, b, c, d = "") => {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "GET",
            url: a,
            encode: true,
            dataType: "json",
            beforeSend: d,
            success: b,
            error: c,
        });
    },
    post: (a, b, c, d, e = "") => {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: a,
            data: b,
            dataType: "json",
            beforeSend: e,
            success: c,
            error: d,
        });
    },
    postWithFile: (a, b, c, d, e = "") => {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: a,
            data: b,
            contentType: false,
            processData: false,
            beforeSend: e,
            success: c,
            error: d,
        });
    },
    put: (a, b, c, d, e = "") => {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "PUT",
            url: a,
            data: b,
            dataType: "json",
            beforeSend: e,
            success: c,
            error: d,
        });
    },
};
