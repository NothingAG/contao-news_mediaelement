# NewsMediaElement - Video support within news articles

* Author:		Stefan Pfister [red@nothing.ch](red@nothing.ch)
* Contributors:	Andreas Schempp [andreas@schempp.ch](andreas@schempp.ch)
* Website: 		[https://www.nothing.ch/](https://www.nothing.ch/)
* Version: 		1.0.0
* Date: 		2012-07-12
* License: 		[GNU Lesser Public License](http://opensource.org/licenses/lgpl-3.0.html)
* Dependencies:	Contao Version from 2.10, mediaelement [https://github.com/aschempp/contao-mediaelement](https://github.com/aschempp/contao-mediaelement)

## Description
Extends the news article with additional fields to include a video into your news articles. You can define a headline, the YouTube ID and the player size. This extension makes use of the `MediaElement.js`.

## Installation and Usage
1. Make sure the `mediaelement` extension is installed and running
2. Copy the files into the _modules_ folder from Contao
3. Update the database (e.g. with the _Extension manager_)
4. Change the template in the _newsreader_ to `news_full_video.html5` or `news_full_video.xhtml`
5. Enjoy :)

## Change Log

*1.0.0 (2012-07-12)*

* initial release

## TODO
* Adding support for H.264, WebM and Ogg videos (like the mediaelement content element)