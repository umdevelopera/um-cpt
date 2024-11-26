# Ultimate Member - Template pages for CPT

Adds special pages used to customize the single post view for Groups and Jobs.

Groups and Jobs are custom post type (CPT) with predefined content.
You can edit these views by overridden template files, see “Alternative solution for developers” below.
But this solution requires experience in WEB developing. You should be familiar with PHP to edit template files.
This plugin creates special pages that can be edited with a page builder and places predefined content (a group or a job) inside this page using a shortcode.

## Key features
- Ability to customize the single group view of the [Groups](https://ultimatemember.com/extensions/groups/) extension with a page builder.
- Ability to customize the single job view of the [JobBoardWP](https://wordpress.org/plugins/jobboardwp/) plugin with a page builder.

## Installation

__Note:__ This plugin requires the [Ultimate Member](https://wordpress.org/plugins/ultimate-member/) plugin to be installed first.

### How to install from GitHub

Open git bash, navigate to the **plugins** folder and execute this command:

`git clone --branch=main git@github.com:umdevelopera/um-cpt.git um-cpt`

Once the plugin is cloned, enter your site admin dashboard and go to _wp-admin > Plugins > Installed Plugins_. Find the **Ultimate Member - Template pages for CPT** plugin and click the **Activate** link.

### How to install from ZIP archive

You can install this plugin from the [ZIP file](https://drive.google.com/file/d/14O8yOuJcI9sAhv2sEaM1qi9PRNAFFJfK/view) as any other plugin. Follow [this instruction](https://wordpress.org/support/article/managing-plugins/#upload-via-wordpress-admin).

## How to use

### Instruction
1) Install the **Ultimate Member - Template pages for CPT** plugin.
2) Go to _wp-admin > Ultimate Member > Settings > Pages_ and create the **Single Group template** and **Single Job template** pages.
3) Go to _wp-admin > Pages_ and search for the **Single Group template** and **Single Job template** pages.
4) Edit the **Single Group template** and **Single Job template** pages with your page builder.
 The **Single Group template** must contain the `[um_single_group]` shortcode.
 The **Single Job template** page must contain the `[um_single_job]` shortcode.
 You can add any blocks you need above and below the shortcode or wrap the shortcode into a block.
5) Test the group view and the job view

### Illustrations

Step 1 - Install the **Ultimate Member - Template pages for CPT** plugin.
![1 - install plugin](https://github.com/user-attachments/assets/09a253df-23be-4d18-98e8-a682b8854f0d)

Step 2 - Create the **Single Group template** and **Single Job template** pages.
![2 - create pages](https://github.com/user-attachments/assets/ed6be401-254d-40e4-84d5-28b49ae26f00)

Step 3 - Go to _wp-admin > Pages_.
![3 - pages](https://github.com/user-attachments/assets/75956083-a5c6-425c-8d57-51a7cc8225eb)

Step 4 - Edit the **Single Group template** and **Single Job template** pages with the page builder.
![4 - group template](https://github.com/user-attachments/assets/9e653d49-5460-441c-894a-00a3f46f3691)

Step 5 - Test the group view and the job view.
![5 - group test](https://github.com/user-attachments/assets/faa78a55-2d05-4f64-a49e-ff2aef675b61)

## Alternative solution for developers

The common layout of the single group view is rendered using the _single.php_ template file in the theme.
You can override and customize the _single.php_ template file in the child theme or create the _single-um_groups.php_ template file for groups.

The inner layout of the single group view is rendered using the _/wp-content/plugins/um-groups/templates/single.php_ template file.
You can override and customize this template file in the child theme - follow instructions in [this article](https://docs.ultimatemember.com/article/1516-templates-map).

The common layout of the single job view is rendered using the _single.php_ template file in the theme.
You can override and customize the _single.php_ template file in the child theme or create the _single-jb-job.php_ template file for jobs.

The inner layout of the single job view is rendered using the _/wp-content/plugins/jobboardwp/templates/single-job.php_ template file.
You can override and customize this template file in the child theme - follow instructions in [this article](https://docs.jobboardwp.com/article/1570-templates-structure).

See also information about the single post template in [Template Hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post).

## Support

This is a free extension created for the community. The Ultimate Member team does not provide support for this extension.

Open new [issue](https://github.com/umdevelopera/um-account-tabs/issues) if you are facing a problem or have a suggestion.

### Related links

Ultimate Member home page: https://ultimatemember.com

Ultimate Member documentation: https://docs.ultimatemember.com

Ultimate Member download: https://wordpress.org/plugins/ultimate-member

---

[Free extensions for Ultimate Member](https://docs.google.com/document/d/1wp5oLOyuh5OUtI9ogcPy8NL428rZ8PVTu_0R-BuKKp8/edit?usp=sharing)
