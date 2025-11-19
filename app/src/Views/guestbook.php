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
    <form action="/guestbook" method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="name">Email (optional)</label>
        <input type="email" id="email" name="email" placeholder="name@example.com">

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php if (!empty($posts)) { ?>
        <h1>Guestbook Entries</h1>
        <?php foreach ($posts as $post) { ?>
            <div class="guestbook-entry">
                <h1>
                    <?= $post['name']; ?>
                </h1>
                <p>
                    <?= $post['message']; ?>
                </p>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p>No entries found in the guestbook.</p>
    <?php } ?>
</body>

</html>