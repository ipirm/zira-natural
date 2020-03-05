function addBasket(id) {
    $.ajax({
        url: '/basket',
        method: "post",
        data: {id: id},
        success: function (response) {
            window.location.reload();
        }
    });
}

function removeBasket(id) {
    $.ajax({
        url: '/remove',
        method: "post",
        data: {id: id},
        success: function (response) {
            window.location.reload();
        }
    });
}

function removeFromBasket(id, event, price) {
    const total = document.querySelector('.modal__total');
    const count = document.querySelector('.basket-count');
    $.ajax({
        url: '/remove',
        method: "post",
        data: {id: id},
        success: function (response) {
            event.target.closest('.modal__product').style.display = 'none';
            let text = total.childNodes[1].innerText;
            let price_text = parseInt(text) - price;
            total.childNodes[1].innerText = price_text + '₼';
            count.innerText = parseInt(count.innerText) - 1;
        }
    });
}

function searchCats(name, event) {
    event.preventDefault();
    window.location = 'http://zira-natural.com/catalog/' + name;
}

function searchShopCats(name, event) {
    event.preventDefault();
    window.location = 'http://zira-natural.com/shop/' + name;
}
function startSearch(event) {
    event.preventDefault();
   let text =  document.querySelector('.mainForm__input').value;
   window.location = 'http://zira-natural.com/search/' + text;
    console.log(text);
}
