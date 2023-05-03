document.addEventListener("DOMContentLoaded", () => {
    let productsContainer = document.querySelector(".products-container");
    // let countProducts = document.querySelector(".count-products");
    let categoryCheck = document.querySelectorAll("[name = status]");


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

    async function getProductsByCategory(categories) {
        //формируем параметр запроса
        let param = new URLSearchParams();
        param.append('statuses', JSON.stringify(categories))
        let products = await getData("/app/pharm/tables/order/order.check.php", param);
        showProducts(products);
    }
    //вывод карточек по категориям на страницу
    function showProducts(products){
        productsContainer.innerHTML = "";
        
        products.forEach(product => {
            productsContainer.insertAdjacentHTML("beforeend", getOneCard(product))
        })
        
    }

    //формирование одной карточки
    function getOneCard({order_id, name, status, date_start, date_end, pharm}){
        return `<tr class="tr-body">
        <td class="table-td">${order_id}</td>
        <td class="table-td">${name}</td>
        <td class="table-td">${status}</td>
        <td class="table-td">${date_start}</td>
        <td class="table-td">${date_end}</td>
        <td class="table-td">${pharm}</td>
        <td class="table-td"><form action="/app/pharm/tables/order/status.php" method="post">
          <button name="id" value="${order_id}">Изменить статус</button>
          <input name="status_id" value="${status}" style="display: none;"></input>
        </form></td>
        <td class="table-td"><form action="/app/pharm/tables/order/seeProd.php" method="post">
          <button name="id" value="${order_id}">Посмотреть товары</button>
        </form></td></tr>`
    }

})

