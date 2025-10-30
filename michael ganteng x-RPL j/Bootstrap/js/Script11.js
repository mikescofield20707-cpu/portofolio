let items = [];
function addItems(){
    
    let itemName = document.getElementById('item-name').value;
    let itemPrice = document.getElementById('item-price').value;
    let itemQuantity = document.getElementById('item-quantity').value;
    let itemdiscount = document.getElementById('item-discount').value
    
    let discountedPrice = itemPrice - (itemPrice * (itemdiscount / 100));

    let SubTotalprice = discountedPrice * itemQuantity;

    if (itemName && itemQuantity && itemPrice && itemdiscount){
        items.push(
            {
                name:itemName,
                price:parseFloat(itemPrice),
                quantity:itemQuantity,
                discount:itemdiscount,
                discountedPrice:parseFloat(discountedPrice),
                SubTotal:parseFloat(SubTotalprice)
            }
        )
        console.log(items);
        showItems();
        calculatingTotalPrice();
        clearitem();
    }
}
function showItems() {
const tbody = document.querySelector('#biling-table tbody');
tbody.innerHTML = "";
items.forEach(item => {
    const tr = document.createElement('tr');

    const nameTd = document.createElement('td');
    nameTd.innerText = item.name;

    const quantityTd = document.createElement('td');
    quantityTd.innerText = item.quantity;

    const priceTd = document.createElement('td');
    priceTd.innerText = "Rp" + item.price.toFixed(2);

    const discountTd = document.createElement('td')
    discountTd.innerText = item.discount + "%";

    const discountedPriceTd = document.createElement('td'); 
        discountedPriceTd.innerText = "Rp" + item.discountedPrice.toFixed(2);

        const SubTotalTd = document.createElement('td');
         SubTotalTd.innerText = "Rp" + item.SubTotal.toFixed(2);

    tr.appendChild(nameTd);
    tr.appendChild(quantityTd);
    tr.appendChild(priceTd);
    tr.appendChild(discountTd);
    tr.appendChild(discountedPriceTd);
    tr.appendChild(SubTotalTd)
    tbody.appendChild(tr);
})
    
}

function calculatingTotalPrice(){
    let totalPrice = 0;
    for (let i =0;i<items.length; i++){
        const item = items[i];
        totalPrice += item.discountedPrice * item.quantity
    }
    const formattedprice = totalPrice.toLocaleString(undefined ,{
     
      minimumFractionDigits:2,
      maximumFractionDigits:2,
    })
        

    document.getElementById('total-price').innerText=`Billing Amount: ${totalPrice}.00`;
}

function clearitem(){
    document.getElementById('item-name').value = "";
    document.getElementById('item-quantity').value = "";
    document.getElementById('item-price').value = "";
    document.getElementById('item-discount').value = "";
}