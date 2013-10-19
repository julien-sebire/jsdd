[Back to Neurone6 development documentation root](../README.md)

# How to ignore mistakenly tracked files

1. Add these files to .gitignore. [Further reading on .gitignore](http://git-scm.com/book/en/Git-Basics-Recording-Changes-to-the-Repository#Ignoring-Files)

1. Remove the files from repository but keep them in the working directory:
  ```bash
  git rm --cached <files>
  ```
  or to remove a entire directory and subdirectories:
  ```bash
  git rm -r --cached <directory>
  ```

1. Commit the .gitignore change:
  ```bash
  git add .gitignore
  git commit -m 'untracked <files>'
  ```

1. Optionaly push to others:
  ```bash
  git push
  ```
