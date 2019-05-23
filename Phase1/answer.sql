SELECT
a.quizAnswersId, a.quizAnswer, a.quizAnswer, a.quizAnswerCorrectFlag, a.quizQuestionsId
FROM quizanswers AS a, quizquestions AS q
WHERE a.quizQuestionsId = q.quizQuestionsId
ORDER BY a.quizQuestionsId, a.quizAnswersId