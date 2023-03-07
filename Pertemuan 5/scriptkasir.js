let items = [];

function addItem() {
    const item = document.getElementById('item').value;
    const price = parseFloat(document.getElementById('price').value);
    const qty = parseInt(document.getElementById('qty').value);

    if (item && price) {
        items.push({ item, price, qty });
        showItems();
        calculateTotal();
        clearFields();
    }
}

function showItems() {
    const itemsList = document.getElementById('items');
    itemsList.innerHTML = 'List Item:';

    items.forEach((item) => {
        const itemEl = document.createElement('div');
        itemEl.classList.add('item');
        itemEl.innerHTML = `<span>${item.item}</span><span>Rpn${item.price.toFixed(2)}</span>${item.qty}`;
        itemsList.appendChild(itemEl);
    });
}



function calculateTotal() {
    const totalEl = document.getElementById('total');
    const total = items.reduce((acc, item) => acc + (item.price * item.qty), 0);
    totalEl.innerHTML = `Total: Rp${total.toFixed(2)}`;
}

function clearFields() {
    document.getElementById('price').value = '';
    document.getElementById('item').value = '';
    document.getelementById('qty').value = '';
}
