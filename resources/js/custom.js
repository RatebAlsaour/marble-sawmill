// var _token = document.getElementsByName('_token')[0].content;

function clearDropDownlistById(id) {
    if (Array.isArray(id)) {
        id.forEach((elem_id) => {
            clearDropDownlistById(elem_id)
        }
    )
    }
    else {
        $(`#${id}`).empty();
        $(`#${id}`).append('<option disabled selected>----------</option>');
    }
}


function callApi(url, selectElem) {
    $('#loaderImage').show();
    $.ajax({
        url: '/ajax/' + url,
        method: 'GET',
        contentType: 'application/json',
        success: function (res) {
            $('#loaderImage').hide();
            res.data.forEach(function (elem) {
                selectElem.append('<option value="' + elem.id + '">' + elem.name + '</option>');
            })
        },
        fail: function () {
            $('#loaderImage').hide();
            console.log('error');
        }
    }).always(function () {

    });
}

// function prepareDynamicForm(id, url, method = 'post') {
//     var _token = document.getElementsByName('_token')[0].content;
//     var form = `<form id="${id}" action="${url}" method="post">
//         <input type="hidden" name="_token" value="${_token}">`;
//
//     if (method == 'patch')
//         form += `<input type="hidden" name="_method" value="patch">`;
//
//     form += '</form>';
//
//     return form;
// }