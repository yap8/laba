<section>
    <h2>Добавить новый фильм:</h2>
    <form action="add.php" method="POST">
        <div>
            <input type="text" name="title" placeholder="название">
        </div>
        <div>
            <select name="country">
                <?php $countries = json_decode(file_get_contents('countries.json'), true); ?>
                <?php foreach ($countries as $country) { ?>
                    <option><?php echo $country['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <input type="number" name="year" min="1900" max="2022" value="2022">
        </div>
        <div>
            <select name="status">
                <option>анонсирован</option>
                <option>в прокате</option>
                <option>прокат окончен</option>
            </select>
        </div>
        <div>
            <textarea name="info" placeholder="информация"></textarea>
        </div>
        <div>
            <button type="submit" name="add">Отправить</button>
        </div>
    </form>
</section>