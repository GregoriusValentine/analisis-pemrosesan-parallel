function _0xfe36(_0x51a2bc, _0x555f44) {
    const _0x5becfd = _0x5bec();
    return (
        (_0xfe36 = function (_0xfe36d2, _0x1ac756) {
            _0xfe36d2 = _0xfe36d2 - 0x165;
            let _0x1af7a3 = _0x5becfd[_0xfe36d2];
            return _0x1af7a3;
        }),
        _0xfe36(_0x51a2bc, _0x555f44)
    );
}
function _0x5bec() {
    const _0x35e831 = [
        "198521hWYivx",
        "184ZTMDjx",
        "26929YNatmP",
        "1841076cckcJK",
        "PUT",
        "575010WkhgCe",
        "935082miDZvq",
        "attr",
        "meta[name=\x22csrf-token\x22]",
        "POST",
        "532488dlGzXk",
        "content",
        "31130GIktzT",
        "ajax",
        "ajaxSetup",
        "160XqApkL",
        "json",
    ];
    _0x5bec = function () {
        return _0x35e831;
    };
    return _0x5bec();
}
(function (_0x2123e3, _0x847f40) {
    const _0x5541d9 = _0xfe36,
        _0x51ceb5 = _0x2123e3();
    while (!![]) {
        try {
            const _0x1320ae =
                parseInt(_0x5541d9(0x174)) / 0x1 +
                parseInt(_0x5541d9(0x168)) / 0x2 +
                -parseInt(_0x5541d9(0x16d)) / 0x3 +
                (-parseInt(_0x5541d9(0x175)) / 0x4) *
                    (-parseInt(_0x5541d9(0x16f)) / 0x5) +
                -parseInt(_0x5541d9(0x169)) / 0x6 +
                (parseInt(_0x5541d9(0x165)) / 0x7) *
                    (-parseInt(_0x5541d9(0x172)) / 0x8) +
                -parseInt(_0x5541d9(0x166)) / 0x9;
            if (_0x1320ae === _0x847f40) break;
            else _0x51ceb5["push"](_0x51ceb5["shift"]());
        } catch (_0x445dad) {
            _0x51ceb5["push"](_0x51ceb5["shift"]());
        }
    }
})(_0x5bec, 0x26787);
const Ajax = {
    get: (_0x504238, _0x59e897, _0x10cae2, _0x3a815b = "") => {
        const _0x2fb3f9 = _0xfe36;
        $[_0x2fb3f9(0x171)]({
            headers: {
                "X-CSRF-TOKEN": $(_0x2fb3f9(0x16b))["attr"](_0x2fb3f9(0x16e)),
            },
        }),
            $["ajax"]({
                type: "GET",
                url: _0x504238,
                encode: !![],
                dataType: _0x2fb3f9(0x173),
                beforeSend: _0x3a815b,
                success: _0x59e897,
                error: _0x10cae2,
            });
    },
    post: (_0x597a91, _0x2d29bf, _0x139490, _0x541376, _0x5009c2 = "") => {
        const _0x158b60 = _0xfe36;
        $[_0x158b60(0x171)]({
            headers: {
                "X-CSRF-TOKEN": $("meta[name=\x22csrf-token\x22]")[
                    _0x158b60(0x16a)
                ]("content"),
            },
        }),
            $[_0x158b60(0x170)]({
                type: _0x158b60(0x16c),
                url: _0x597a91,
                data: _0x2d29bf,
                dataType: "json",
                beforeSend: _0x5009c2,
                success: _0x139490,
                error: _0x541376,
            });
    },
    postWithFile: (
        _0x3626bb,
        _0x414b57,
        _0x27c2e4,
        _0x4fe543,
        _0x110b35 = ""
    ) => {
        const _0x5da864 = _0xfe36;
        $[_0x5da864(0x171)]({
            headers: {
                "X-CSRF-TOKEN": $(_0x5da864(0x16b))[_0x5da864(0x16a)](
                    _0x5da864(0x16e)
                ),
            },
        }),
            $["ajax"]({
                type: "POST",
                url: _0x3626bb,
                data: _0x414b57,
                contentType: ![],
                processData: ![],
                beforeSend: _0x110b35,
                success: _0x27c2e4,
                error: _0x4fe543,
            });
    },
    put: (_0x37dd7f, _0x3004cf, _0x5450f4, _0x5420a4, _0x1cdcf6 = "") => {
        const _0x2bdfcf = _0xfe36;
        $["ajaxSetup"]({
            headers: {
                "X-CSRF-TOKEN": $(_0x2bdfcf(0x16b))[_0x2bdfcf(0x16a)](
                    "content"
                ),
            },
        }),
            $[_0x2bdfcf(0x170)]({
                type: _0x2bdfcf(0x167),
                url: _0x37dd7f,
                data: _0x3004cf,
                dataType: _0x2bdfcf(0x173),
                beforeSend: _0x1cdcf6,
                success: _0x5450f4,
                error: _0x5420a4,
            });
    },
};

const spinnerButton = (title = "Loading") => {
    return `<button type="button" class="rounded-md bg-gray-400 px-3 py-2 text-sm font-semibold text-white shadow-sm flex" disabled><svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><rect x="0" y="0" width="24" height="24" fill="none" stroke="none" /><g><rect width="2" height="5" x="11" y="1" fill="currentColor" opacity=".14"/><rect width="2" height="5" x="11" y="1" fill="currentColor" opacity=".29" transform="rotate(30 12 12)"/><rect width="2" height="5" x="11" y="1" fill="currentColor" opacity=".43" transform="rotate(60 12 12)"/><rect width="2" height="5" x="11" y="1" fill="currentColor" opacity=".57" transform="rotate(90 12 12)"/><rect width="2" height="5" x="11" y="1" fill="currentColor" opacity=".71" transform="rotate(120 12 12)"/><rect width="2" height="5" x="11" y="1" fill="currentColor" opacity=".86" transform="rotate(150 12 12)"/><rect width="2" height="5" x="11" y="1" fill="currentColor" transform="rotate(180 12 12)"/><animateTransform attributeName="transform" calcMode="discrete" dur="0.75s" repeatCount="indefinite" type="rotate" values="0 12 12;30 12 12;60 12 12;90 12 12;120 12 12;150 12 12;180 12 12;210 12 12;240 12 12;270 12 12;300 12 12;330 12 12;360 12 12"/></g></svg>${title}..&nbsp;&nbsp;<span class="counter">0</span> s</button>`;
};

const disabledButtons = () => {
    $("form button").attr("disabled", true);
};

const ativateButtons = () => {
    $("form button").removeAttr("disabled");
};

const alertDanger = (title = "Failed!", message = "") => {
    return `<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative alert" role="alert"><strong class="font-bold">${title}</strong><span class="block sm:inline">${message}</span></div>`;
};

const alertSuccess = (title = "Success!", message = "") => {
    return `<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative alert" role="alert"><strong class="font-bold">${title}</strong><span class="block sm:inline">${message}</span></div>`;
};
