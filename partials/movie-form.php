<section>
    <h2>Добавить новый фильм:</h2>
    <form action="add.php" method="POST">
        <div class="form-group">
            <input class="form-control" type="text" name="title" placeholder="название">
        </div>
        <div class="form-group">
            <select class="form-control" name="country">
                <?php $countries = json_decode(file_get_contents('countries.json'), true); ?>
                <?php foreach ($countries as $country) { ?>
                    <option><?php echo $country['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <input class="form-control" type="number" name="year" min="1900" max="2022" value="2022">
        </div>
        <div class="form-group">
            <select class="form-control" name="status">
                <option>анонсирован</option>
                <option>в прокате</option>
                <option>прокат окончен</option>
            </select>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="info" placeholder="информация"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit" name="add">Отправить</button>
        </div>
    </form>
</section>
