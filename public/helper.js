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
    delete: (a, c, d, e = "") => {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "DELETE",
            url: a,
            encode: true,
            dataType: "json",
            beforeSend: e,
            success: c,
            error: d,
        });
    },
};

const spinnerButton = (title = "Loading", countInit = 0) => {
    return `<button type="button" class="rounded-md bg-gray-400 px-3 py-2 text-sm font-semibold text-white shadow-sm flex" disabled><svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><rect x="0" y="0" width="24" height="24" fill="none" stroke="none" /><g><rect width="2" height="5" x="11" y="1" fill="currentColor" opacity=".14"/><rect width="2" height="5" x="11" y="1" fill="currentColor" opacity=".29" transform="rotate(30 12 12)"/><rect width="2" height="5" x="11" y="1" fill="currentColor" opacity=".43" transform="rotate(60 12 12)"/><rect width="2" height="5" x="11" y="1" fill="currentColor" opacity=".57" transform="rotate(90 12 12)"/><rect width="2" height="5" x="11" y="1" fill="currentColor" opacity=".71" transform="rotate(120 12 12)"/><rect width="2" height="5" x="11" y="1" fill="currentColor" opacity=".86" transform="rotate(150 12 12)"/><rect width="2" height="5" x="11" y="1" fill="currentColor" transform="rotate(180 12 12)"/><animateTransform attributeName="transform" calcMode="discrete" dur="0.75s" repeatCount="indefinite" type="rotate" values="0 12 12;30 12 12;60 12 12;90 12 12;120 12 12;150 12 12;180 12 12;210 12 12;240 12 12;270 12 12;300 12 12;330 12 12;360 12 12"/></g></svg>${title}..&nbsp;&nbsp;<span class="counter">${countInit}</span> s</button>`;
};

const disabledButtons = () => {
    $("form button").attr("disabled", true);
};

const ativateButtons = () => {
    $("form button").removeAttr("disabled");
};

const alertDanger = (title = "Failed!", message = "") => {
    return `<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative alert" role="alert"><strong class="font-bold">${title}</strong>&nbsp;&nbsp;<span class="block sm:inline ms-3">${message}</span></div>`;
};

const alertSuccess = (title = "Success!", message = "") => {
    return `<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative alert" role="alert"><strong class="font-bold">${title}</strong><span class="block sm:inline ms-3">${message}</span></div>`;
};
