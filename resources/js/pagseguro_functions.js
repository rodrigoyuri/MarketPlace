function processPayment(token) {

    let data = {
        card_token: token,
        hash: PagSeguroDirectPayment.getSenderHash(),
        installment: document.querySelector('.select_installments').value,
        card_name: document.querySelector('input[name=card_name]').value,
        _token: csrf
    };


    $.ajax({
        type: 'POST',
        url: urlProcess,
        data: data,
        dataType: 'json',
        success: function(res) {
            toastr.success(res.data.message, 'Sucesso')
            window.location.href = `${urlThanks}?order=${res.data.message}`;
        }
    });
}

function getInstallments(amount, brand) {
    PagSeguroDirectPayment.getInstallments({
        amount: amount,
        brand: brand,
        maxInstallNoInterest: 0,
        success: function(res) {
            let selectInstallments = drawSelectInstallments(res.installments[brand]);
            document.querySelector('div.installments').innerHTML = selectInstallments;
        },
        error: function(err) {
            console.log(err);
        },
        complete: function(res) {
            console.log(res);
        }
    });
}

function drawSelectInstallments(installments) {
    let select = '<label>Opções de Parcelamento:</label>';

    select += '<select class="form-control select_installments">';

    for(let l of installments) {
        select += `<option value="${l.quantity}|${l.installmentAmount}">${l.quantity}x de ${l.installmentAmount} - Total fica ${l.totalAmount}</option>`;
    }


    select += '</select>';

    return select;
}

function showErrorMessages(message) {
    return `<div class="alert alert-danger">${message}</div>`
}

function errorsMapPagseguroJS(code) {
    switch(code) {
        case "10000":
            return 'Bandeira do cartão inválida';
        break;

        case "10001":
            return 'Número do Cartão com tamanho inválido';
        break;

        case "10002": 
        case "30405":
            return 'Data com formato inválido';
        break;

        case "10003":
            return 'Código de segurança inválido';
        break;

        case "10004":
            return 'Código de segurança Obrigatório';
        break;

        case "10006":
            return 'Tamanho do código de segurança inválido';
        break;

        default:
            return 'Houve um erro na validação do seu cartão de crédito!';
        break;
    }
}