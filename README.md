LegacyRS
========

A minimal Zend Framework 2 Module designed primarily to render a legacy, procedural codebase (specifically ResourceSpace) through a ZF2 wrapper.  The code could be repurposed to support a different procedural codebase, but would require customization to the application.  For an example of an integrated application built around this module, see [DAM4](https://github.com/claytondaley/DAM4).

LegacyRS exemplifies a variety of techniques for handling legacy code: 
 
 - Distinct handling both PHP page delivery and legacy file delivery through a single Action
     - All calls to non-PHP files use the Stream response type to minimize memory impact
 - Dealing with global variables in the legacy codebase (a solution is provided, but alternative suggestions are welcomed)
 - Using buffers to cache legacy pages
     - LegacyRS uses this technique so it can search the page for `<title>` tags and push this information to an analytics package
     - LegacyRS also shows how to wrap legacy code that itself uses buffers 
 - How to complete page processing if `exit` or `die` is called in the legacy codebase

LegacyRS also includes some supplemental features to smooth the integration between a legacy codebase and a ZF2 application 

 - Doctrine Entity definitions for legacy resources
     - LegacyRS includes tweaks (naming, etc.) to these tables for [ZfcUser](https://github.com/ZF-Commons/ZfcUser) and [ZfcRbac](https://github.com/ZF-Commons/zfc-rbac)
     - A migration script will be required but is not yet provided
 - ZF2 routes for specific, legacy pages and a sophisticated framework for selectively redirecting these pages to other resources
     - In theory, all legacy routes can be identified and coded into the legacy wrapper
     - If a consumer does not elect to redirect a specific route, it defaults to the legacy codebase
 - Delegation of legacy configuration to the ZF2 layer
     - This currently requires a user to replace the standard config file in the legacy codebase
     - Once in place, all legacy configs can be managed through a ZF2 config file (or other ZF2 strategy) 
     - Eventually a simple migration strategy should (will?) be provided
 - Implements analytics interfaces defined by [DaleyPiwik](https://github.com/claytondaley/DaleyPiwik)