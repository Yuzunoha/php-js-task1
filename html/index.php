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

function deleteMessage($id)
{
    $pdo = getPdo();
    $sql = 'delete from messages where id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    return $stmt->execute();
}

function h($a)
{
    return htmlspecialchars($a);
}

if ('POST' === $_SERVER["REQUEST_METHOD"]) {
    deleteMessage($_POST['id']);
}

?>

<html>

<body>

    <table>
        <?php
        $ret = getMessages();
        foreach ($ret as $o) {
            $id = h($o['id']);
            $text = h($o['text']);
            echo '<tr>';
            echo '<td>' . $text . '</td>';
            echo '<td><button onclick="onclickDelete(' . $id . ', \'' . $text . '\')">削除</button></td>';
            echo '</tr>';
        }
        ?>
    </table>
    <script>
        const onclickDelete = (id, text) => {
            let s = '次のメッセージを削除しますか。\n';
            s += 'id: ' + id + '\n';
            s += 'text: ' + text + '\n';

            const ret = confirm(s);
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
