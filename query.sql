SELECT
    comment_db.comment,
    comment_db.sentiment_res,
    comment_db.created_at,
    user_db.username
FROM
    comment_db
    INNER JOIN user_db ON comment_db.user_id = user_db.id
WHERE
    comment_db.movie_id = '$id'