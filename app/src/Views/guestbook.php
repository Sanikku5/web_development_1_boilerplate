<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastenboek jonge!</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div>
        <iframe src="https://giphy.com/embed/RMZBsdFnax7mo" width="480" height="480" style="" frameBorder="0"
        class="giphy-embed" allowFullScreen></iframe>
    </div>
    <?php if (!empty($posts)) { ?>
        <h1>Guestbook Entries</h1>
        <ul>
            <?php foreach ($posts as $post) { ?>
            <li>
                <?= $post['name']; ?>
                <p>
                    <?= $post['message']; ?>
                </p>
            </li>
            <?php } ?>
        </ul>
        <?php }
        else
        { ?>
            <p>No entries found in the guestbook.</p>
        <?php } ?>
</body>
</html>