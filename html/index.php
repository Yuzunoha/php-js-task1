<?php

function p($a = '')
{
    echo $a . PHP_EOL;
}

function getPdo()
{
    $pdo = new PDO('mysql:host=db;dbname=bbs', 'root', 'root');
    return $pdo;
}

function getMessages()
{
    $pdo = getPdo();
    $sql = 'select * from messages';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $ret = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $ret;
}

function main()
{
    p('$_SERVER[REQUEST_METHOD]');
    p($_SERVER["REQUEST_METHOD"]);
    if ('POST' === $_SERVER["REQUEST_METHOD"]) {
        print_r($_POST);
    }
}

main();
?>

<html>

<body>

    <table>
        <?php
        $ret = getMessages();
        foreach ($ret as $o) {
            $id = $o['id'];
            echo '<tr>';
            echo '<td>' . $o['text'] . '</td>';
            echo '<td><button onclick="onclickDelete(' . $id . ')">削除</button></td>';
            echo '</tr>';
        }
        ?>
    </table>
    <script>
        const onclickDelete = (id) => {
            const ret = confirm('削除～' + id);
            if (ret) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.innerHTML = '<input name="id" value="' + id + '">';
                document.body.append(form);
                form.submit();
            }
        }
    </script>
</body>

</html>
