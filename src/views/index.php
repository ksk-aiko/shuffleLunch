<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>シャッフルランチ</title>
</head>
<body>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>シャッフルランチ</title>
</head>
<body>
    <h1>
        <a href="index.php">シャッフルランチ</a>
    </h1>
    <a href="employee.php">社員を登録する</a>
    <form method="POST" action="shuffle">
        <button type="submit">シャッフルする</button>
    </form>

    <?php if (!empty($groups)): ?>
        <h2>グループ分け結果</h2>
        <?php foreach ($groups as $index => $group): ?>
            <h3>グループ <?php echo $index + 1; ?></h3>
            <ul>
                <?php foreach ($group as $employee): ?>
                    <li><?php echo htmlspecialchars($employee['name'], ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>