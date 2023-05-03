document.addEventListener("DOMContentLoaded", () => {
    let productsContainer = document.querySelector(".products-container");
    // let countProducts = document.querySelector(".count-products");
    let categoryCheck = document.querySelectorAll("[name = type]");


  //создаем массив в которыйй запихаем все чиселки категорий
  let valuesChecks = [];

  //цикл в котором как раз пихаем
  categoryCheck.forEach((i) => {
    valuesChecks.unshift(i.value);
  });

  //функция вызывается изначально и получает на вход все чиселки всех категорий
  getProductsByCategory(valuesChecks);

  //функция для проверки включения всех чексбоксов из массива
  function checksChecked(arr) {
    check = 0;
    arr.forEach((i) => {
      if (i.checked) check++;
    });
    return check == arr.length;
  }

    //отрабатываем выбор категории
    categoryCheck.forEach(item => {
        item.addEventListener("change", async() => {
            //формируем массив из id категорий, взяли колекцию в массив вытащили вкл флажки и забрали включенные
            let categoriesChecked = [...categoryCheck].filter(item => item.checked).map(item=>item.value);
            //получаем товары выбранной категории
            await getProductsByCategory(categoriesChecked);
        })
    });

    async function getProductsByCategory(type) {
        //формируем параметр запроса
        let param = new URLSearchParams();
        param.append('types', JSON.stringify(type))
        let products = await getData("/app/pharm/tables/product/search.check.php", param);
        showProducts(products);
    }

    //вывод карточек по категориям на страницу
    function showProducts(products){
        productsContainer.innerHTML = "";
        products.forEach(product => {
            productsContainer.insertAdjacentHTML("beforeend", getOneCard(product))
        })
        // countProducts.textContent = products.length + " шт";
    }

    //формирование одной карточки
    function getOneCard({id, name, experation_age, price, count, type, photo, relese}){
        return `<tr class="tr-body"><td><img src="/upload/${photo}" style="width: 50px; height: 50px;" alt="${photo}"></td>
        <td class="table-td">${name}</td>
        <td class="table-td">${experation_age}</td>
        <td class="table-td">${price}</td>
        <td class="table-td">${count}</td>
        <td class="table-td">${type}</td>
        <td class="table-td">${relese}</td>
        <td class="table-td"><form action="/app/pharm/tables/product/red.php" method="post"><button name="btn" value=${id}>Редактировать</button></form></td>
        <td class="table-td"><form action="/app/pharm/tables/product/show.php" method="post"><button name="btn">Подробнее</button><input name="id" type="text" value="${id}" style="display: none;"></form></td>
        </tr>`
    }
    
})

