# Neurone6 development documentation

This repo gathers all Neurone6 development workflows and processes.

## Contents

1. [Make your own documentation with markdown](#a_markdown)
1. Git
  1. [Understanding Git](#a_git_start)
  1. [Git tools](#a_git_tools)
  1. [Some specific tasks](#a_git_tasks)
  1. [Workflows](#a_git_workflows)
1. [Working with GitHub](#a_github)


## Make your own documentation

Writing down documentation whenever you find a way to do something new is a good way to memorize and learn.

<a name="a_markdown"></a>
### Markdown

We use the [Markdown syntax](http://daringfireball.net/projects/markdown/syntax) (.md files) to write down our documentation.
However stated so on [this page](https://help.github.com/articles/github-flavored-markdown), it seems that GitHub basic .md files display doesn't totally apply the [GitHub Flavored Markdown](http://github.github.com/github-flavored-markdown/) syntax, hence a double paragraph character is necessary to display separated lines.

You may want to visualize your markdown files before pushing them online:

- [Chrome extension](https://chrome.google.com/webstore/detail/markdown-preview/jmchmkecamhbiokiopfpnfgbidieafmd?hl=en) (click on FREE+ at top-right to install)

- [Windows installer](https://bitbucket.org/wcoenen/downmarker/downloads)

- [Mac version]() (any mac-using developer out there ?)

## Versioning your collaborative work with Git and GitHub

Here is a list of guidelines to how we manage collaborative work at Neurone6, using the excellent versioning tools Git and GitHub provide.

----
### Git

<a name="a_git_start"></a>
#### Start working with Git

You should really read at least the first three chapters of the wonderful and extensive online book on [Understanding Git](http://git-scm.com/documentation) by Scott Chacon.

In particular, the following pages are strongly recommended:

- [What is version control](http://git-scm.com/book/en/Getting-Started-About-Version-Control)

- [Install and startup working with Git](http://git-scm.com/book/en/Getting-Started-Installing-Git)

- [Git basics](http://git-scm.com/book/en/Getting-Started-Git-Basics)

- **[Interactive cheatsheet](http://ndpsoftware.com/git-cheatsheet.html)**

<a name="a_git_start"></a>
#### Tools

*This section is WIP*

You can do all the job on the command line or use some gui tools :

- On Linux, git comes with everything already included :

  - git command line aliases (*help wanted*)

  - git gui + gitk (*help wanted*)

- On Windows:

  - git bash with MsysGit (*help wanted*)

  - many [third-party git GUIs](http://git-scm.com/downloads/guis)

<a name="a_git_tasks"></a>
#### Some specific tasks detailed:

- [How to ignore mistakenly tracked files](versioning/git_ignore_mistakenly_tracked_files.md)

- [How to change your last commit's message](versioning/git_change_your_last_commit_message.md)

- [How to stage deleted files](versioning/git_stage_deleted_files.md)

<a name="a_git_workflows"></a>
#### Git workflows

For medium to large-scale projects, we use the [Git Flow branching model](http://pygmeeweb.com/2013/09/02/git-the-gitflow-way.html).

- **[Git Flow cheatsheet](http://danielkummer.github.io/git-flow-cheatsheet/)**

-----
<a name="a_github"></a>
### GitHub

Even if there are other places existing, [GitHub](https://github.com/) is our natural choice to store our git-managed collaborative work online.

- [Begin your existence on GitHub](https://github.com/signup/free): having a membership at github.com allows you to store your own work, contribute to other projects, fork repositories, ...

- [Submit and resolve an issue](versioning/github_submit_and_resolve_an_issue.md)

- [Pull request workflow](versioning/github_pull_request_worflow.md) -- ***WIP***

- [Repo management: create, invite collaborators, fork, clone, ...](versioning/github_repository_management.md) -- ***WIP***

## Others topics yet to come

**TODO**

## More

All suggestions about topics to cover are very welcome.
