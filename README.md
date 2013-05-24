# wpwhatchanged #
## Note ##
This is just a quick dirty implementation because this feature was badly needed, but not important enough to spend too much time with it. Use at your own risk.

## Features ##
Shows a table of recently changed posts directly at your wordpress dashboard. Currently it shows: 
* post_name (The posts name in cleartext)
* post_type  (Wether it's a post or a page)
* post_modified	(The date at which the post or page has been modified)
* post_status (The current status, like draft, published and so on)
* an edit link (A link that sends you directly into the edit action for the current post, so you can check the revisions)

## Installation ##
1. Clone the repository into your wp-content/plugins directory, so you end up with something like: wp-content/plugins/wpwhatchanged/.
2. In your Wordpress backend open up 'Plugins', search for 'wpwhatchanged' and click 'Activate'.
3. In your Wordpress backend open up 'Dashboard', at the top right click the button 'Screen Options', add a checkmark in front of 'Latest Changes (wpwhatchanged)'

That's it. You should see the latest changes in a table at the dashboard.

~~Donate~~ Donut if you like it. :)
