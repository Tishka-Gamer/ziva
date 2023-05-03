function clear(){
  document.getElementById("basket-empty").textContent = "Корзина пуста";
  document.getElementById("obsh").textContent = "";
  document.getElementById("total-count").textContent = "";
  document.querySelector(".all-delete").style.display = "none";
  document.querySelector(".order").style.display = "none";
}
async function outResult(productId, action) {
  let { productInBasket, allSum, allCount } = await postJSON(
    "/app/tables/baskets/save.basket.php",
    productId,
    action
  );
  //проверим что не удаление
  if (productInBasket != "delete") {
    document.getElementById(
      `product-count-${productId}`
    ).textContent = `${productInBasket.count} шт`;
    document.getElementById(
      `product-price-${productId}`
    ).textContent = `${productInBasket.price_position}`;
  }
  console.log(allCount);
  if(allCount == null)
  {
    clear();
  }
  document.getElementById("obsh").textContent = allSum;
  document.getElementById("total-count").textContent = allCount;
  //если корзина пустая надо вывести слова "корзина пустая"
  
}

document.addEventListener("click", async (event) => {
  if (event.target.classList.contains("minus")) {
    outResult(event.target.dataset.productId, "minus");
  }
  if (event.target.classList.contains("plus")) {
    outResult(event.target.dataset.productId, "add");
  }
  if (event.target.classList.contains("delete")) {
    outResult(event.target.dataset.productId, "del");
    event.target.closest(".basket-position").remove();
  }
});
document.querySelector(".all-delete").addEventListener("click", ()=>{
  outResult('', 'allDelete');
  document.querySelector('.products-container').remove();
  clear();
})
// if(document.querySelector(".order").addEventListener("click", ()=>{
//   outResult('', 'allDelete');
//   document.querySelector('.products-container').remove();
//   clear();
// }));