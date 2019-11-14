<?php include_once "layout/header.php" ?>
    <div class="panel-body mt-4">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-7">
                <div class="input-group">
                    <form action="add" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Введите URL ресторана:</label>
                            <input type="text" class="form-control" name="url" required="required" placeholder="URL" id="url">
                        </div>
                        <input type="submit" name="submit" value="Добавить" class="btn btn-success btn-sm btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="wrapper">
        <div id="messages"></div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th width="20%">ID</th>
                <th width="20%">Имя</th>
                <th width="20%">Фамилия</th>
                <th width="20%">Email</th>
                <th width="10%">Тип</th>
                <th width="20%">Действие</th>
            </tr>
            </thead>
            <br>
            <?php foreach ($url as $url_value) { ?>
                <tr>
                    <th><?php echo $url_value["id"] ?></th>
                    <th><?php echo $url_value["first_name"]; ?></th>
                    <td><?php echo $url_value["last_name"]; ?></td>
                    <td><?php echo $url_value["emails_value"]; ?></td>
                    <td><?php echo $url_value["type"]; ?></td>
                    <td><a href="/delete/<?php echo $url_value["id"]; ?>" class="btn btn-danger">Удалить</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php include_once "layout/footer.php" ?>