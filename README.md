p.mwop.net
==========

This is the source code behind http://p.mwop.net/ - a pastebin application.

It uses:

- PhlyPaste -- module providing pastebin functionality
- PhlyMongo -- to allow using MongoDB as a persistence backend
- ZfcUser + ScnSocialAuth -- to allow users to login to the site and thus avoid
  using CAPTCHAs
- Zend Framework 2

I personally deploy this to http://openshift.redhat.com/

You will need to configure:

- ZfcUser and ScnSocialAuth
- Your persistence backend, whether it is `Zend\Db` or `MongoDB`
