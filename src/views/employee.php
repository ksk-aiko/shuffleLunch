<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>シャッフルランチ</title>
</head>
<body>
    <h1>
        <a href="/">シャッフルランチ</a>
    </h1>
    <h2>
        社員の登録
    </h2>
    <form action="/employee/create" method="post">
        <label for="name">社員名</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        <?php if ($error): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
        <button type="submit">登録する</button>
    </form>

    <h2>社員の一覧</h2>
    <ul>
        <?php if (empty($employees)) : ?>
            <li>社員が登録されていません。</li>
        <?php else : ?>
            <?php foreach ($employees as $employee) : ?>
                <li><?php echo htmlspecialchars($employee['name'], ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</body>
</html>