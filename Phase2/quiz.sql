SELECT
		t.quizTopicName,
		q.quizQuestionsId AS qNo,
		q.quizQuestion,
		a.quizAnswersId AS ansNo,
		a.quizAnswer,
		a.quizAnswerCorrectFlag
FROM
		quizTopic AS t,
		quizQuestions AS q,
		quizAnswers AS a
WHERE
		t.quizActiveFlag = "Y"
AND	q.quizTopicId = t.quizTopicId
AND	a.quizQuestionsId = q.quizQuestionsId
AND	a.quizAnswerCorrectFlag = "Y"

ORDER BY
		t.quizTopicName DESC,
		qNo,
		a.quizAnswer DESC