<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
?>

<div class="cont">
    <form action="/app/tables/users/insert-user.php" method="post" class="reg-form" enctype="multipart/form-data">
        <div class="reg-group">
            <h1><?= $_SESSION["res"] ?? "Заполните форму" ?></h1>
            <div class="reg-form-group">
                <label for="name" class="reg-form-label">Ваше имя*</label>
                <input value="<?= $_SESSION["name"] ?? "" ?>" type="text" name="name" class="reg-form-control" id="name">

            </div>
            <p class="right-p"><?= $_SESSION["errors"]["name"] ?? "" ?></p>
            <div class="reg-form-group">
                <label for="surname" class="reg-form-label">Фамилия*</label>
                <input value="<?= $_SESSION["surname"] ?? "" ?>" type="text" name="surname" class="reg-form-control" id="surname">

            </div>
            <p class="right-p"><?= $_SESSION["errors"]["surname"] ?? "" ?></p>

            <div class="reg-form-group">
                <label for="firstname" class="reg-form-label">Отчество</label>
                <input value="<?= $_SESSION["firstname"] ?? "" ?>" type="text" name="firstname" class="reg-form-control" id="firstname">

            </div>
            <p class="right-p"><?= $_SESSION["errors"]["firstname"] ?? "" ?></p>

            <div class="reg-form-group">
                <label for="number" class="reg-form-label">Номер*</label>
                <input value="<?= $_SESSION["number"] ?? "" ?>" type="tel" name="number" class="reg-form-control" id="number" pattern="9[0-9]{9}">
            </div>
            <p class="right-p"><?= $_SESSION["errors"]["patronymic"] ?? "" ?></p>

            <div class="reg-form-group">
                <label for="email" class="reg-form-label">email*</label>
                <input value="<?= $_SESSION["email"] ?? "" ?>" type="text" name="email" class="reg-form-control" id="email">
            </div>
            <p class="right-p"><?= $_SESSION["errors"]["email"] ?? "" ?></p>

            <div class="reg-form-group">
                <label for="date_birthday" class="reg-form-label">Введите дату рождения</label>
                <input type="date" name="date_birthday" class="reg-form-control" id="date_birthday">
            </div>
            <p class="right-p"><?= $_SESSION["errors"]["date_birthday"] ?? "" ?></p>

            <div class="reg-form-group">
                <label for="password" class="reg-form-label">Пароль*</label>
                <input type="password" name="password" class="reg-form-control" id="password">
            </div>

            <div class="reg-form-group">
                <label for="password_confirmation" class="reg-form-label">Повтор пароля*</label>
                <input type="password" name="password_confirmation" class="reg-form-control" id="password_confirmation">
            </div>
            <p class="right-p"><?= $_SESSION["errors"]["password"] ?? "" ?></p>
            <div class="reg-form-group">
                <label for="agreement" class="sogl">Согласие на обработку данных:</label>
                <input type="checkbox" name="agreement" class="reg-sogl" id="agreement" checked style="width: 300px;">
            </div>

            <div class="reg-avatar">
                <img src="/upload/ava.svg" alt="" class="reg-img">
                <div class="reg-input">
                    <!-- <label for="image" class="reg-label">Выберите аватар</label> -->
                    <input type="file" name="image" class="btnimg">
                </div>

            </div>
            <div class="form-group">
                <button name="btn" class="reg-btn">Зарегистрироваться</button>
            </div>
        </div>
    </form>
</div>

<script>
    let img = document.querySelector(".reg-img");
    document.querySelector("#agreement").addEventListener("change", () => {
        document.querySelector("[name=btn]").disabled = !document.getElementById("agreement").checked
    })
    document.querySelector('.btnimg').addEventListener("change", (event) => {
        let file = event.target.files[0];
        img.src = URL.createObjectURL(file);
    });
</script>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>

<?php
unset($_SESSION["res"]);
