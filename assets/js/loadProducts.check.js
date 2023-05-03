document.addEventListener("DOMContentLoaded", () => {
    let productsContainer = document.querySelector(".products-container");
    // let countProducts = document.querySelector(".count-products");
    // let categoryCheck = document.querySelectorAll("[name = category]");


  //создаем массив в которыйй запихаем все чиселки категорий
//   let valuesChecks = [];

//   //цикл в котором как раз пихаем
//   categoryCheck.forEach((i) => {
//     valuesChecks.unshift(i.value);
//   });

//   //функция вызывается изначально и получает на вход все чиселки всех категорий
//   getProductsByCategory(valuesChecks);

//   //функция для проверки включения всех чексбоксов из массива
//   function checksChecked(arr) {
//     check = 0;
//     arr.forEach((i) => {
//       if (i.checked) check++;
//     });
//     return check == arr.length;
//   }

//     //отрабатываем выбор категории
//     categoryCheck.forEach(item => {
//         item.addEventListener("change", async() => {
//             //формируем массив из id категорий, взяли колекцию в массив вытащили вкл флажки и забрали включенные
//             let categoriesChecked = [...categoryCheck].filter(item => item.checked).map(item=>item.value);
//             //получаем товары выбранной категории
//             await getProductsByCategory(categoriesChecked);
//         })
//     });

//     async function getProductsByCategory(categories) {
//         //формируем параметр запроса
//         let param = new URLSearchParams();
//         param.append('categories', JSON.stringify(categories))
//         let products = await getData("/app/tables/products/search.check.php", param);
//         showProducts(products);
//     }

    //вывод карточек по категориям на страницу
    function showProducts(products){
        productsContainer.innerHTML = "";
        products.forEach(product => {
            productsContainer.insertAdjacentHTML("beforeend", getOneCard(product))
        })
        countProducts.textContent = products.length + " шт";
    }

    //формирование одной карточки
    function getOneCard({id, name, photo, price}){
        return `
        <div class="col">
            <div class="card">
                <img src="/upload/${photo}" class="card-img-top" alt="${photo}">
                <form action="/app/tables/products/show.php" method="post">
                    <div class="card-body">
                        <button name="id" value="${id}"><h5 class="card-title"><${name}></h5></button>
                        <p class="card-text"><${price}> ₽</p>
                    </div>
                </form>
                <button id="btn-${id}" data-btn-id=${id} class="btn-basket">Добавить в корзину</button>
            </div>
        </div>`
    }
    // select.addEventListener
    //добавление товара в корзину
    document.addEventListener("click", async(event)=> {
        if(event.target.classList.contains("btn-basket")){
            let id = event.target.dataset.btnId;
            let res = await postJSON("/app/tables/baskets/save.basket.php",id,"add");
            // console.log(res);
        }
    })
    
})

