document.addEventListener("DOMContentLoaded", () => {
    let categoryCheck = document.querySelectorAll("[name = cont]");
    let input = document.querySelector('.cont')
  //создаем массив в которыйй запихаем все чиселки категорий
  let valuesChecks = [];

  //цикл в котором как раз пихаем
  categoryCheck.forEach((i) => {
    valuesChecks.unshift(i.value);
  });

  //функция вызывается изначально и получает на вход все чиселки всех категорий
  getProductsByCategory(valuesChecks);

  //функция для проверки включения всех чексбоксов из массива
  // function checksChecked(arr) {
  //   check = 0;
  //   arr.forEach((i) => {
  //     if (i.checked) check++;
  //   });
  //   return check == arr.length;
  // }

    //отрабатываем выбор категории
    categoryCheck.forEach(item => {
        item.addEventListener("change", async() => {
            //формируем массив из id категорий, взяли колекцию в массив вытащили вкл флажки и забрали включенные
            let categoriesChecked = [...categoryCheck].filter(item => item.checked).map(item=>item.value);
            //получаем товары выбранной категории
            await getProductsByCategory(categoriesChecked);
            console.log(categoriesChecked)
        })
    });

    async function getProductsByCategory(categories) {
        //формируем параметр запроса
        let param = new URLSearchParams();
        param.append('conts', JSON.stringify(categories))
        let products = await getData("/app/admin/tables/product/addProd.php", param);
        showProducts(products);
    }

    //вывод карточек по категориям на страницу
    function showProducts(products){
        input.innerHTML = "";
        
        products.forEach(product => {
          input.insertAdjacentHTML("beforeend", product)
        })
        
    }

    // //формирование одной карточки
    // function getOneCard({typeId, typeName, category, image}){
    //     return `
    //     <td><img src="/upload/${image}" style="width: 50px; height: 50px;" alt="${image}"></td>
    //     <td>${typeName}</td>
    //     <td>${category}</td>
    //     <td><form action="/app/admin/tables/product/typeProd.php" method="post">
    //       <button name="id" value="${typeId}">Посмотреть товары</button>
    //     </form></td>`
    // }

})