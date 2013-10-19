[Back to Neurone6 development documentation root](../README.md)

# How to submit and resolve an issue on GitHub

## Submit an issue
Once you've found a bug or wish to suggest a better way to do something, the best collaborative way to inform collaborators is to raise an issue in the repo on GitHub:

1. Go to the repo's page and click on the "Issues" button (top-right).

1. Check whether a similar issue is not already opened in the list of open issues.

1. Click on the green "New issue" button (top-right) and fill out the issue form. Be descriptive and precise but concise in your comment. You may add labels from the list on the right, to characterize your issue. You can assign it to someone, even yourself, as a reminder.

1. When you submit your issue, it is given a number. You can always edit your issue after the submission, change the comment, labels and assignments. You will receive notifications about the issue since you started the thread.

## Comment an issue
As long as you are able to collaborate to a repository, you can provide feedback to an issue by eaving comment.

## Close an issue

1. You can manually close an issue by just clicking on the Close button below message form.

1. You can automaticaly close one or more issue through your commit message. Just include one of the closing words followed by a # and the issue number in your commit message. For example:
  ```
  git commit -m 'Fixed #32'
  git push origin
  ```

  When pushed to the GitHub repo, the issue is automatically closed.
  Closing words (case-insentitive) are : close, closes, closed, fix, fixes, fixed, resolve, resolves, resolved.

You can also automatically close an issue through a [pull request](pull_request_workflow.md) message body (not title) and across repositories by following [these simple rules](https://help.github.com/articles/closing-issues-via-commit-messages).
