[JSDD](../README.md) &gt; [Start with Git](git-start.md) &gt; Change your last commit message

# How to change your last commit message

Say you just committed and typed something wrong as the message:

- If you didn't push and didn't stage anything else yet, you can just amend your commit with :
  ```bash
  git commit --amend
  ```
  You're then given the possibility to edit your commit message.

- If you already staged some changes but don't want to include them in the commit, you must unstage them prior to amend your commit with the command above :
  ```bash
  git reset HEAD <files>
  git commit --amend
  ```

- If you already pushed your commit, ***DON'T AMEND YOUR COMMIT***, as it may break the repository tree that others may have already pulled, merged and pushed again...
  In this case, nevermind your typo.
  The ony serious problem happens if you pushed a commit which has [automatically closed a bug](github_submit_and_resolve_an_issue.md) with the wrong number on GitHub. You then have to manually re-open the wrongly closed bug and close the right one on GitHub.

For other cases (not the last commit to change, more than one, ...), here is [a good discussion on the subject on StackOverflow](http://stackoverflow.com/a/180085/1942472).
