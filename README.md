LegacyRS
========

A minimal Zend Framework 2 Module designed primarily to render a legacy, procedural codebase (specifically ResourceSpace) through a ZF2 wrapper.  The code could be repurposed to support a different procedural codebase, but would require numerous adjustments.

For an example of an integrated application built around this module, see [DAM4](https://github.com/claytondaley/DAM4).  This application takes advantage of a variety of features implemented in the ZF2 wrapper layer.  As a result, it provides examples of:
 
 - Distinct handling both PHP page delivery and legacy file delivery through a single Action
 - Dealing with global variables in the legacy codebase (a solution is provided, but alternatives are welcomed)
 - Dealing with buffers in the legacy codebase
 - How to complete processing if `exit` or `die` is called in the legacy codebase
 - Doctrine Entity definitions for RS tables (with minor tweaks for [ZfcUser](https://github.com/ZF-Commons/ZfcUser) and [ZfcRbac](https://github.com/ZF-Commons/zfc-rbac))
 - Implements analytics interfaces defined by [DaleyPiwik](https://github.com/claytondaley/DaleyPiwik)