<?php

namespace Lar\Layout {

    /**
     * @method self|static|\Lar\Layout\Abstracts\Component onAbort($data) Set abort Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onAbort($data) Set parent abort Event
     * @method self|static|\Lar\Layout\Abstracts\Component onAbortIf($eq, $data) Set abort Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onAbortIf($eq, $data) Set parent abort Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onAfterprint($data) Set afterprint Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onAfterprint($data) Set parent afterprint Event
     * @method self|static|\Lar\Layout\Abstracts\Component onAfterprintIf($eq, $data) Set afterprint Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onAfterprintIf($eq, $data) Set parent afterprint Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onAnimationend($data) Set animationend Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onAnimationend($data) Set parent animationend Event
     * @method self|static|\Lar\Layout\Abstracts\Component onAnimationendIf($eq, $data) Set animationend Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onAnimationendIf($eq, $data) Set parent animationend Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onAnimationiteration($data) Set animationiteration Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onAnimationiteration($data) Set parent animationiteration Event
     * @method self|static|\Lar\Layout\Abstracts\Component onAnimationiterationIf($eq, $data) Set animationiteration Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onAnimationiterationIf($eq, $data) Set parent animationiteration Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onAnimationstart($data) Set animationstart Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onAnimationstart($data) Set parent animationstart Event
     * @method self|static|\Lar\Layout\Abstracts\Component onAnimationstartIf($eq, $data) Set animationstart Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onAnimationstartIf($eq, $data) Set parent animationstart Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onBeforeprint($data) Set beforeprint Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onBeforeprint($data) Set parent beforeprint Event
     * @method self|static|\Lar\Layout\Abstracts\Component onBeforeprintIf($eq, $data) Set beforeprint Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onBeforeprintIf($eq, $data) Set parent beforeprint Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onBeforeunload($data) Set beforeunload Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onBeforeunload($data) Set parent beforeunload Event
     * @method self|static|\Lar\Layout\Abstracts\Component onBeforeunloadIf($eq, $data) Set beforeunload Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onBeforeunloadIf($eq, $data) Set parent beforeunload Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onBlur($data) Set blur Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onBlur($data) Set parent blur Event
     * @method self|static|\Lar\Layout\Abstracts\Component onBlurIf($eq, $data) Set blur Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onBlurIf($eq, $data) Set parent blur Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onCanplay($data) Set canplay Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onCanplay($data) Set parent canplay Event
     * @method self|static|\Lar\Layout\Abstracts\Component onCanplayIf($eq, $data) Set canplay Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onCanplayIf($eq, $data) Set parent canplay Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onCanplaythrough($data) Set canplaythrough Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onCanplaythrough($data) Set parent canplaythrough Event
     * @method self|static|\Lar\Layout\Abstracts\Component onCanplaythroughIf($eq, $data) Set canplaythrough Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onCanplaythroughIf($eq, $data) Set parent canplaythrough Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onChange($data) Set change Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onChange($data) Set parent change Event
     * @method self|static|\Lar\Layout\Abstracts\Component onChangeIf($eq, $data) Set change Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onChangeIf($eq, $data) Set parent change Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onClick($data) Set click Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onClick($data) Set parent click Event
     * @method self|static|\Lar\Layout\Abstracts\Component onClickIf($eq, $data) Set click Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onClickIf($eq, $data) Set parent click Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onContextmenu($data) Set contextmenu Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onContextmenu($data) Set parent contextmenu Event
     * @method self|static|\Lar\Layout\Abstracts\Component onContextmenuIf($eq, $data) Set contextmenu Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onContextmenuIf($eq, $data) Set parent contextmenu Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onCopy($data) Set copy Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onCopy($data) Set parent copy Event
     * @method self|static|\Lar\Layout\Abstracts\Component onCopyIf($eq, $data) Set copy Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onCopyIf($eq, $data) Set parent copy Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onCut($data) Set cut Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onCut($data) Set parent cut Event
     * @method self|static|\Lar\Layout\Abstracts\Component onCutIf($eq, $data) Set cut Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onCutIf($eq, $data) Set parent cut Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onDblclick($data) Set dblclick Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onDblclick($data) Set parent dblclick Event
     * @method self|static|\Lar\Layout\Abstracts\Component onDblclickIf($eq, $data) Set dblclick Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onDblclickIf($eq, $data) Set parent dblclick Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onDrag($data) Set drag Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onDrag($data) Set parent drag Event
     * @method self|static|\Lar\Layout\Abstracts\Component onDragIf($eq, $data) Set drag Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onDragIf($eq, $data) Set parent drag Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onDragend($data) Set dragend Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onDragend($data) Set parent dragend Event
     * @method self|static|\Lar\Layout\Abstracts\Component onDragendIf($eq, $data) Set dragend Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onDragendIf($eq, $data) Set parent dragend Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onDragenter($data) Set dragenter Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onDragenter($data) Set parent dragenter Event
     * @method self|static|\Lar\Layout\Abstracts\Component onDragenterIf($eq, $data) Set dragenter Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onDragenterIf($eq, $data) Set parent dragenter Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onDragleave($data) Set dragleave Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onDragleave($data) Set parent dragleave Event
     * @method self|static|\Lar\Layout\Abstracts\Component onDragleaveIf($eq, $data) Set dragleave Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onDragleaveIf($eq, $data) Set parent dragleave Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onDragover($data) Set dragover Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onDragover($data) Set parent dragover Event
     * @method self|static|\Lar\Layout\Abstracts\Component onDragoverIf($eq, $data) Set dragover Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onDragoverIf($eq, $data) Set parent dragover Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onDragstart($data) Set dragstart Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onDragstart($data) Set parent dragstart Event
     * @method self|static|\Lar\Layout\Abstracts\Component onDragstartIf($eq, $data) Set dragstart Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onDragstartIf($eq, $data) Set parent dragstart Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onDrop($data) Set drop Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onDrop($data) Set parent drop Event
     * @method self|static|\Lar\Layout\Abstracts\Component onDropIf($eq, $data) Set drop Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onDropIf($eq, $data) Set parent drop Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onDurationchange($data) Set durationchange Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onDurationchange($data) Set parent durationchange Event
     * @method self|static|\Lar\Layout\Abstracts\Component onDurationchangeIf($eq, $data) Set durationchange Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onDurationchangeIf($eq, $data) Set parent durationchange Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onEnded($data) Set ended Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onEnded($data) Set parent ended Event
     * @method self|static|\Lar\Layout\Abstracts\Component onEndedIf($eq, $data) Set ended Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onEndedIf($eq, $data) Set parent ended Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onError($data) Set error Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onError($data) Set parent error Event
     * @method self|static|\Lar\Layout\Abstracts\Component onErrorIf($eq, $data) Set error Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onErrorIf($eq, $data) Set parent error Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onFocus($data) Set focus Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onFocus($data) Set parent focus Event
     * @method self|static|\Lar\Layout\Abstracts\Component onFocusIf($eq, $data) Set focus Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onFocusIf($eq, $data) Set parent focus Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onFocusin($data) Set focusin Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onFocusin($data) Set parent focusin Event
     * @method self|static|\Lar\Layout\Abstracts\Component onFocusinIf($eq, $data) Set focusin Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onFocusinIf($eq, $data) Set parent focusin Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onFocusout($data) Set focusout Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onFocusout($data) Set parent focusout Event
     * @method self|static|\Lar\Layout\Abstracts\Component onFocusoutIf($eq, $data) Set focusout Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onFocusoutIf($eq, $data) Set parent focusout Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onFullscreenchange($data) Set fullscreenchange Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onFullscreenchange($data) Set parent fullscreenchange Event
     * @method self|static|\Lar\Layout\Abstracts\Component onFullscreenchangeIf($eq, $data) Set fullscreenchange Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onFullscreenchangeIf($eq, $data) Set parent fullscreenchange Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onFullscreenerror($data) Set fullscreenerror Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onFullscreenerror($data) Set parent fullscreenerror Event
     * @method self|static|\Lar\Layout\Abstracts\Component onFullscreenerrorIf($eq, $data) Set fullscreenerror Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onFullscreenerrorIf($eq, $data) Set parent fullscreenerror Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onHashchange($data) Set hashchange Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onHashchange($data) Set parent hashchange Event
     * @method self|static|\Lar\Layout\Abstracts\Component onHashchangeIf($eq, $data) Set hashchange Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onHashchangeIf($eq, $data) Set parent hashchange Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onInput($data) Set input Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onInput($data) Set parent input Event
     * @method self|static|\Lar\Layout\Abstracts\Component onInputIf($eq, $data) Set input Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onInputIf($eq, $data) Set parent input Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onInvalid($data) Set invalid Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onInvalid($data) Set parent invalid Event
     * @method self|static|\Lar\Layout\Abstracts\Component onInvalidIf($eq, $data) Set invalid Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onInvalidIf($eq, $data) Set parent invalid Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onKeydown($data) Set keydown Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onKeydown($data) Set parent keydown Event
     * @method self|static|\Lar\Layout\Abstracts\Component onKeydownIf($eq, $data) Set keydown Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onKeydownIf($eq, $data) Set parent keydown Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onKeypress($data) Set keypress Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onKeypress($data) Set parent keypress Event
     * @method self|static|\Lar\Layout\Abstracts\Component onKeypressIf($eq, $data) Set keypress Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onKeypressIf($eq, $data) Set parent keypress Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onKeyup($data) Set keyup Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onKeyup($data) Set parent keyup Event
     * @method self|static|\Lar\Layout\Abstracts\Component onKeyupIf($eq, $data) Set keyup Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onKeyupIf($eq, $data) Set parent keyup Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onLoad($data) Set load Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onLoad($data) Set parent load Event
     * @method self|static|\Lar\Layout\Abstracts\Component onLoadIf($eq, $data) Set load Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onLoadIf($eq, $data) Set parent load Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onLoadeddata($data) Set loadeddata Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onLoadeddata($data) Set parent loadeddata Event
     * @method self|static|\Lar\Layout\Abstracts\Component onLoadeddataIf($eq, $data) Set loadeddata Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onLoadeddataIf($eq, $data) Set parent loadeddata Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onLoadedmetadata($data) Set loadedmetadata Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onLoadedmetadata($data) Set parent loadedmetadata Event
     * @method self|static|\Lar\Layout\Abstracts\Component onLoadedmetadataIf($eq, $data) Set loadedmetadata Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onLoadedmetadataIf($eq, $data) Set parent loadedmetadata Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onLoadstart($data) Set loadstart Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onLoadstart($data) Set parent loadstart Event
     * @method self|static|\Lar\Layout\Abstracts\Component onLoadstartIf($eq, $data) Set loadstart Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onLoadstartIf($eq, $data) Set parent loadstart Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onMessage($data) Set message Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onMessage($data) Set parent message Event
     * @method self|static|\Lar\Layout\Abstracts\Component onMessageIf($eq, $data) Set message Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onMessageIf($eq, $data) Set parent message Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onMousedown($data) Set mousedown Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onMousedown($data) Set parent mousedown Event
     * @method self|static|\Lar\Layout\Abstracts\Component onMousedownIf($eq, $data) Set mousedown Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onMousedownIf($eq, $data) Set parent mousedown Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onMouseenter($data) Set mouseenter Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onMouseenter($data) Set parent mouseenter Event
     * @method self|static|\Lar\Layout\Abstracts\Component onMouseenterIf($eq, $data) Set mouseenter Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onMouseenterIf($eq, $data) Set parent mouseenter Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onMouseleave($data) Set mouseleave Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onMouseleave($data) Set parent mouseleave Event
     * @method self|static|\Lar\Layout\Abstracts\Component onMouseleaveIf($eq, $data) Set mouseleave Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onMouseleaveIf($eq, $data) Set parent mouseleave Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onMousemove($data) Set mousemove Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onMousemove($data) Set parent mousemove Event
     * @method self|static|\Lar\Layout\Abstracts\Component onMousemoveIf($eq, $data) Set mousemove Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onMousemoveIf($eq, $data) Set parent mousemove Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onMouseover($data) Set mouseover Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onMouseover($data) Set parent mouseover Event
     * @method self|static|\Lar\Layout\Abstracts\Component onMouseoverIf($eq, $data) Set mouseover Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onMouseoverIf($eq, $data) Set parent mouseover Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onMouseout($data) Set mouseout Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onMouseout($data) Set parent mouseout Event
     * @method self|static|\Lar\Layout\Abstracts\Component onMouseoutIf($eq, $data) Set mouseout Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onMouseoutIf($eq, $data) Set parent mouseout Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onMouseup($data) Set mouseup Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onMouseup($data) Set parent mouseup Event
     * @method self|static|\Lar\Layout\Abstracts\Component onMouseupIf($eq, $data) Set mouseup Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onMouseupIf($eq, $data) Set parent mouseup Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onMousewheel($data) Set mousewheel Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onMousewheel($data) Set parent mousewheel Event
     * @method self|static|\Lar\Layout\Abstracts\Component onMousewheelIf($eq, $data) Set mousewheel Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onMousewheelIf($eq, $data) Set parent mousewheel Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onOffline($data) Set offline Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onOffline($data) Set parent offline Event
     * @method self|static|\Lar\Layout\Abstracts\Component onOfflineIf($eq, $data) Set offline Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onOfflineIf($eq, $data) Set parent offline Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onOnline($data) Set online Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onOnline($data) Set parent online Event
     * @method self|static|\Lar\Layout\Abstracts\Component onOnlineIf($eq, $data) Set online Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onOnlineIf($eq, $data) Set parent online Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onOpen($data) Set open Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onOpen($data) Set parent open Event
     * @method self|static|\Lar\Layout\Abstracts\Component onOpenIf($eq, $data) Set open Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onOpenIf($eq, $data) Set parent open Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onPagehide($data) Set pagehide Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onPagehide($data) Set parent pagehide Event
     * @method self|static|\Lar\Layout\Abstracts\Component onPagehideIf($eq, $data) Set pagehide Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onPagehideIf($eq, $data) Set parent pagehide Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onPageshow($data) Set pageshow Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onPageshow($data) Set parent pageshow Event
     * @method self|static|\Lar\Layout\Abstracts\Component onPageshowIf($eq, $data) Set pageshow Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onPageshowIf($eq, $data) Set parent pageshow Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onPaste($data) Set paste Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onPaste($data) Set parent paste Event
     * @method self|static|\Lar\Layout\Abstracts\Component onPasteIf($eq, $data) Set paste Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onPasteIf($eq, $data) Set parent paste Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onPause($data) Set pause Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onPause($data) Set parent pause Event
     * @method self|static|\Lar\Layout\Abstracts\Component onPauseIf($eq, $data) Set pause Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onPauseIf($eq, $data) Set parent pause Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onPlay($data) Set play Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onPlay($data) Set parent play Event
     * @method self|static|\Lar\Layout\Abstracts\Component onPlayIf($eq, $data) Set play Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onPlayIf($eq, $data) Set parent play Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onPlaying($data) Set playing Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onPlaying($data) Set parent playing Event
     * @method self|static|\Lar\Layout\Abstracts\Component onPlayingIf($eq, $data) Set playing Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onPlayingIf($eq, $data) Set parent playing Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onPopstate($data) Set popstate Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onPopstate($data) Set parent popstate Event
     * @method self|static|\Lar\Layout\Abstracts\Component onPopstateIf($eq, $data) Set popstate Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onPopstateIf($eq, $data) Set parent popstate Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onProgress($data) Set progress Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onProgress($data) Set parent progress Event
     * @method self|static|\Lar\Layout\Abstracts\Component onProgressIf($eq, $data) Set progress Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onProgressIf($eq, $data) Set parent progress Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onRatechange($data) Set ratechange Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onRatechange($data) Set parent ratechange Event
     * @method self|static|\Lar\Layout\Abstracts\Component onRatechangeIf($eq, $data) Set ratechange Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onRatechangeIf($eq, $data) Set parent ratechange Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onResize($data) Set resize Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onResize($data) Set parent resize Event
     * @method self|static|\Lar\Layout\Abstracts\Component onResizeIf($eq, $data) Set resize Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onResizeIf($eq, $data) Set parent resize Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onReset($data) Set reset Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onReset($data) Set parent reset Event
     * @method self|static|\Lar\Layout\Abstracts\Component onResetIf($eq, $data) Set reset Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onResetIf($eq, $data) Set parent reset Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onScroll($data) Set scroll Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onScroll($data) Set parent scroll Event
     * @method self|static|\Lar\Layout\Abstracts\Component onScrollIf($eq, $data) Set scroll Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onScrollIf($eq, $data) Set parent scroll Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onSearch($data) Set search Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onSearch($data) Set parent search Event
     * @method self|static|\Lar\Layout\Abstracts\Component onSearchIf($eq, $data) Set search Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onSearchIf($eq, $data) Set parent search Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onSeeked($data) Set seeked Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onSeeked($data) Set parent seeked Event
     * @method self|static|\Lar\Layout\Abstracts\Component onSeekedIf($eq, $data) Set seeked Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onSeekedIf($eq, $data) Set parent seeked Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onSeeking($data) Set seeking Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onSeeking($data) Set parent seeking Event
     * @method self|static|\Lar\Layout\Abstracts\Component onSeekingIf($eq, $data) Set seeking Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onSeekingIf($eq, $data) Set parent seeking Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onSelect($data) Set select Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onSelect($data) Set parent select Event
     * @method self|static|\Lar\Layout\Abstracts\Component onSelectIf($eq, $data) Set select Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onSelectIf($eq, $data) Set parent select Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onShow($data) Set show Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onShow($data) Set parent show Event
     * @method self|static|\Lar\Layout\Abstracts\Component onShowIf($eq, $data) Set show Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onShowIf($eq, $data) Set parent show Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onStalled($data) Set stalled Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onStalled($data) Set parent stalled Event
     * @method self|static|\Lar\Layout\Abstracts\Component onStalledIf($eq, $data) Set stalled Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onStalledIf($eq, $data) Set parent stalled Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onStorage($data) Set storage Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onStorage($data) Set parent storage Event
     * @method self|static|\Lar\Layout\Abstracts\Component onStorageIf($eq, $data) Set storage Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onStorageIf($eq, $data) Set parent storage Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onSubmit($data) Set submit Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onSubmit($data) Set parent submit Event
     * @method self|static|\Lar\Layout\Abstracts\Component onSubmitIf($eq, $data) Set submit Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onSubmitIf($eq, $data) Set parent submit Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onSuspend($data) Set suspend Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onSuspend($data) Set parent suspend Event
     * @method self|static|\Lar\Layout\Abstracts\Component onSuspendIf($eq, $data) Set suspend Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onSuspendIf($eq, $data) Set parent suspend Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onTimeupdate($data) Set timeupdate Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onTimeupdate($data) Set parent timeupdate Event
     * @method self|static|\Lar\Layout\Abstracts\Component onTimeupdateIf($eq, $data) Set timeupdate Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onTimeupdateIf($eq, $data) Set parent timeupdate Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onToggle($data) Set toggle Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onToggle($data) Set parent toggle Event
     * @method self|static|\Lar\Layout\Abstracts\Component onToggleIf($eq, $data) Set toggle Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onToggleIf($eq, $data) Set parent toggle Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onTouchcancel($data) Set touchcancel Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onTouchcancel($data) Set parent touchcancel Event
     * @method self|static|\Lar\Layout\Abstracts\Component onTouchcancelIf($eq, $data) Set touchcancel Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onTouchcancelIf($eq, $data) Set parent touchcancel Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onTouchend($data) Set touchend Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onTouchend($data) Set parent touchend Event
     * @method self|static|\Lar\Layout\Abstracts\Component onTouchendIf($eq, $data) Set touchend Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onTouchendIf($eq, $data) Set parent touchend Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onTouchmove($data) Set touchmove Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onTouchmove($data) Set parent touchmove Event
     * @method self|static|\Lar\Layout\Abstracts\Component onTouchmoveIf($eq, $data) Set touchmove Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onTouchmoveIf($eq, $data) Set parent touchmove Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onTouchstart($data) Set touchstart Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onTouchstart($data) Set parent touchstart Event
     * @method self|static|\Lar\Layout\Abstracts\Component onTouchstartIf($eq, $data) Set touchstart Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onTouchstartIf($eq, $data) Set parent touchstart Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onTransitionend($data) Set transitionend Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onTransitionend($data) Set parent transitionend Event
     * @method self|static|\Lar\Layout\Abstracts\Component onTransitionendIf($eq, $data) Set transitionend Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onTransitionendIf($eq, $data) Set parent transitionend Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onUnload($data) Set unload Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onUnload($data) Set parent unload Event
     * @method self|static|\Lar\Layout\Abstracts\Component onUnloadIf($eq, $data) Set unload Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onUnloadIf($eq, $data) Set parent unload Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onVolumechange($data) Set volumechange Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onVolumechange($data) Set parent volumechange Event
     * @method self|static|\Lar\Layout\Abstracts\Component onVolumechangeIf($eq, $data) Set volumechange Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onVolumechangeIf($eq, $data) Set parent volumechange Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onWaiting($data) Set waiting Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onWaiting($data) Set parent waiting Event
     * @method self|static|\Lar\Layout\Abstracts\Component onWaitingIf($eq, $data) Set waiting Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onWaitingIf($eq, $data) Set parent waiting Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component onWheel($data) Set wheel Event
     * @method self|static|\Lar\Layout\Abstracts\Component _onWheel($data) Set parent wheel Event
     * @method self|static|\Lar\Layout\Abstracts\Component onWheelIf($eq, $data) Set wheel Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _onWheelIf($eq, $data) Set parent wheel Event if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component setAccept(string $accept_data = "") Set accept Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setAccept(string $accept_data = "") Set parent accept Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAcceptIf($eq, string $accept_data = "") Set accept Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setAcceptIf($eq, string $accept_data = "") Set parent accept Attribute if $eq == true
     * @method string getAccept() Get accept Attribute
     * @method string _getAccept() Get parent accept Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAcceptCharset(string $accept_charset_data = "") Set accept_charset Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setAcceptCharset(string $accept_charset_data = "") Set parent accept_charset Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAcceptCharsetIf($eq, string $accept_charset_data = "") Set accept_charset Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setAcceptCharsetIf($eq, string $accept_charset_data = "") Set parent accept_charset Attribute if $eq == true
     * @method string getAcceptCharset() Get accept_charset Attribute
     * @method string _getAcceptCharset() Get parent accept_charset Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAccesskey(string $accesskey_data = "") Set accesskey Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setAccesskey(string $accesskey_data = "") Set parent accesskey Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAccesskeyIf($eq, string $accesskey_data = "") Set accesskey Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setAccesskeyIf($eq, string $accesskey_data = "") Set parent accesskey Attribute if $eq == true
     * @method string getAccesskey() Get accesskey Attribute
     * @method string _getAccesskey() Get parent accesskey Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAction(string $action_data = "") Set action Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setAction(string $action_data = "") Set parent action Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setActionIf($eq, string $action_data = "") Set action Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setActionIf($eq, string $action_data = "") Set parent action Attribute if $eq == true
     * @method string getAction() Get action Attribute
     * @method string _getAction() Get parent action Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAlign(string $align_data = "") Set align Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setAlign(string $align_data = "") Set parent align Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAlignIf($eq, string $align_data = "") Set align Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setAlignIf($eq, string $align_data = "") Set parent align Attribute if $eq == true
     * @method string getAlign() Get align Attribute
     * @method string _getAlign() Get parent align Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAlt(string $alt_data = "") Set alt Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setAlt(string $alt_data = "") Set parent alt Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAltIf($eq, string $alt_data = "") Set alt Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setAltIf($eq, string $alt_data = "") Set parent alt Attribute if $eq == true
     * @method string getAlt() Get alt Attribute
     * @method string _getAlt() Get parent alt Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAsync(string $async_data = "") Set async Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setAsync(string $async_data = "") Set parent async Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAsyncIf($eq, string $async_data = "") Set async Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setAsyncIf($eq, string $async_data = "") Set parent async Attribute if $eq == true
     * @method string getAsync() Get async Attribute
     * @method string _getAsync() Get parent async Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAutocomplete(string $autocomplete_data = "") Set autocomplete Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setAutocomplete(string $autocomplete_data = "") Set parent autocomplete Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAutocompleteIf($eq, string $autocomplete_data = "") Set autocomplete Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setAutocompleteIf($eq, string $autocomplete_data = "") Set parent autocomplete Attribute if $eq == true
     * @method string getAutocomplete() Get autocomplete Attribute
     * @method string _getAutocomplete() Get parent autocomplete Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAutofocus(string $autofocus_data = "") Set autofocus Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setAutofocus(string $autofocus_data = "") Set parent autofocus Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAutofocusIf($eq, string $autofocus_data = "") Set autofocus Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setAutofocusIf($eq, string $autofocus_data = "") Set parent autofocus Attribute if $eq == true
     * @method string getAutofocus() Get autofocus Attribute
     * @method string _getAutofocus() Get parent autofocus Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAutoplay(string $autoplay_data = "") Set autoplay Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setAutoplay(string $autoplay_data = "") Set parent autoplay Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setAutoplayIf($eq, string $autoplay_data = "") Set autoplay Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setAutoplayIf($eq, string $autoplay_data = "") Set parent autoplay Attribute if $eq == true
     * @method string getAutoplay() Get autoplay Attribute
     * @method string _getAutoplay() Get parent autoplay Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setBgcolor(string $bgcolor_data = "") Set bgcolor Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setBgcolor(string $bgcolor_data = "") Set parent bgcolor Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setBgcolorIf($eq, string $bgcolor_data = "") Set bgcolor Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setBgcolorIf($eq, string $bgcolor_data = "") Set parent bgcolor Attribute if $eq == true
     * @method string getBgcolor() Get bgcolor Attribute
     * @method string _getBgcolor() Get parent bgcolor Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setBorder(string $border_data = "") Set border Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setBorder(string $border_data = "") Set parent border Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setBorderIf($eq, string $border_data = "") Set border Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setBorderIf($eq, string $border_data = "") Set parent border Attribute if $eq == true
     * @method string getBorder() Get border Attribute
     * @method string _getBorder() Get parent border Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setCharset(string $charset_data = "") Set charset Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setCharset(string $charset_data = "") Set parent charset Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setCharsetIf($eq, string $charset_data = "") Set charset Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setCharsetIf($eq, string $charset_data = "") Set parent charset Attribute if $eq == true
     * @method string getCharset() Get charset Attribute
     * @method string _getCharset() Get parent charset Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setChecked(string $checked_data = "") Set checked Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setChecked(string $checked_data = "") Set parent checked Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setCheckedIf($eq, string $checked_data = "") Set checked Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setCheckedIf($eq, string $checked_data = "") Set parent checked Attribute if $eq == true
     * @method string getChecked() Get checked Attribute
     * @method string _getChecked() Get parent checked Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setCite(string $cite_data = "") Set cite Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setCite(string $cite_data = "") Set parent cite Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setCiteIf($eq, string $cite_data = "") Set cite Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setCiteIf($eq, string $cite_data = "") Set parent cite Attribute if $eq == true
     * @method string getCite() Get cite Attribute
     * @method string _getCite() Get parent cite Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setClass(string $class_data = "") Set class Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setClass(string $class_data = "") Set parent class Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setClassIf($eq, string $class_data = "") Set class Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setClassIf($eq, string $class_data = "") Set parent class Attribute if $eq == true
     * @method string getClass() Get class Attribute
     * @method string _getClass() Get parent class Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setColor(string $color_data = "") Set color Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setColor(string $color_data = "") Set parent color Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setColorIf($eq, string $color_data = "") Set color Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setColorIf($eq, string $color_data = "") Set parent color Attribute if $eq == true
     * @method string getColor() Get color Attribute
     * @method string _getColor() Get parent color Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setCols(string $cols_data = "") Set cols Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setCols(string $cols_data = "") Set parent cols Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setColsIf($eq, string $cols_data = "") Set cols Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setColsIf($eq, string $cols_data = "") Set parent cols Attribute if $eq == true
     * @method string getCols() Get cols Attribute
     * @method string _getCols() Get parent cols Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setColspan(string $colspan_data = "") Set colspan Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setColspan(string $colspan_data = "") Set parent colspan Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setColspanIf($eq, string $colspan_data = "") Set colspan Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setColspanIf($eq, string $colspan_data = "") Set parent colspan Attribute if $eq == true
     * @method string getColspan() Get colspan Attribute
     * @method string _getColspan() Get parent colspan Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setContent(string $content_data = "") Set content Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setContent(string $content_data = "") Set parent content Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setContentIf($eq, string $content_data = "") Set content Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setContentIf($eq, string $content_data = "") Set parent content Attribute if $eq == true
     * @method string getContent() Get content Attribute
     * @method string _getContent() Get parent content Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setContenteditable(string $contenteditable_data = "") Set contenteditable Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setContenteditable(string $contenteditable_data = "") Set parent contenteditable Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setContenteditableIf($eq, string $contenteditable_data = "") Set contenteditable Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setContenteditableIf($eq, string $contenteditable_data = "") Set parent contenteditable Attribute if $eq == true
     * @method string getContenteditable() Get contenteditable Attribute
     * @method string _getContenteditable() Get parent contenteditable Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setControls(string $controls_data = "") Set controls Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setControls(string $controls_data = "") Set parent controls Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setControlsIf($eq, string $controls_data = "") Set controls Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setControlsIf($eq, string $controls_data = "") Set parent controls Attribute if $eq == true
     * @method string getControls() Get controls Attribute
     * @method string _getControls() Get parent controls Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setCoords(string $coords_data = "") Set coords Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setCoords(string $coords_data = "") Set parent coords Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setCoordsIf($eq, string $coords_data = "") Set coords Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setCoordsIf($eq, string $coords_data = "") Set parent coords Attribute if $eq == true
     * @method string getCoords() Get coords Attribute
     * @method string _getCoords() Get parent coords Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setData(string $data_data = "") Set data Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setData(string $data_data = "") Set parent data Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDataIf($eq, string $data_data = "") Set data Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setDataIf($eq, string $data_data = "") Set parent data Attribute if $eq == true
     * @method string getData() Get data Attribute
     * @method string _getData() Get parent data Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDatetime(string $datetime_data = "") Set datetime Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setDatetime(string $datetime_data = "") Set parent datetime Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDatetimeIf($eq, string $datetime_data = "") Set datetime Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setDatetimeIf($eq, string $datetime_data = "") Set parent datetime Attribute if $eq == true
     * @method string getDatetime() Get datetime Attribute
     * @method string _getDatetime() Get parent datetime Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDefault(string $default_data = "") Set default Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setDefault(string $default_data = "") Set parent default Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDefaultIf($eq, string $default_data = "") Set default Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setDefaultIf($eq, string $default_data = "") Set parent default Attribute if $eq == true
     * @method string getDefault() Get default Attribute
     * @method string _getDefault() Get parent default Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDefer(string $defer_data = "") Set defer Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setDefer(string $defer_data = "") Set parent defer Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDeferIf($eq, string $defer_data = "") Set defer Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setDeferIf($eq, string $defer_data = "") Set parent defer Attribute if $eq == true
     * @method string getDefer() Get defer Attribute
     * @method string _getDefer() Get parent defer Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDir(string $dir_data = "") Set dir Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setDir(string $dir_data = "") Set parent dir Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDirIf($eq, string $dir_data = "") Set dir Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setDirIf($eq, string $dir_data = "") Set parent dir Attribute if $eq == true
     * @method string getDir() Get dir Attribute
     * @method string _getDir() Get parent dir Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDirname(string $dirname_data = "") Set dirname Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setDirname(string $dirname_data = "") Set parent dirname Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDirnameIf($eq, string $dirname_data = "") Set dirname Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setDirnameIf($eq, string $dirname_data = "") Set parent dirname Attribute if $eq == true
     * @method string getDirname() Get dirname Attribute
     * @method string _getDirname() Get parent dirname Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDisabled(string $disabled_data = "") Set disabled Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setDisabled(string $disabled_data = "") Set parent disabled Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDisabledIf($eq, string $disabled_data = "") Set disabled Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setDisabledIf($eq, string $disabled_data = "") Set parent disabled Attribute if $eq == true
     * @method string getDisabled() Get disabled Attribute
     * @method string _getDisabled() Get parent disabled Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDownload(string $download_data = "") Set download Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setDownload(string $download_data = "") Set parent download Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDownloadIf($eq, string $download_data = "") Set download Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setDownloadIf($eq, string $download_data = "") Set parent download Attribute if $eq == true
     * @method string getDownload() Get download Attribute
     * @method string _getDownload() Get parent download Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDraggable(string $draggable_data = "") Set draggable Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setDraggable(string $draggable_data = "") Set parent draggable Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDraggableIf($eq, string $draggable_data = "") Set draggable Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setDraggableIf($eq, string $draggable_data = "") Set parent draggable Attribute if $eq == true
     * @method string getDraggable() Get draggable Attribute
     * @method string _getDraggable() Get parent draggable Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDropzone(string $dropzone_data = "") Set dropzone Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setDropzone(string $dropzone_data = "") Set parent dropzone Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setDropzoneIf($eq, string $dropzone_data = "") Set dropzone Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setDropzoneIf($eq, string $dropzone_data = "") Set parent dropzone Attribute if $eq == true
     * @method string getDropzone() Get dropzone Attribute
     * @method string _getDropzone() Get parent dropzone Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setEnctype(string $enctype_data = "") Set enctype Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setEnctype(string $enctype_data = "") Set parent enctype Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setEnctypeIf($eq, string $enctype_data = "") Set enctype Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setEnctypeIf($eq, string $enctype_data = "") Set parent enctype Attribute if $eq == true
     * @method string getEnctype() Get enctype Attribute
     * @method string _getEnctype() Get parent enctype Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setFor(string $for_data = "") Set for Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setFor(string $for_data = "") Set parent for Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setForIf($eq, string $for_data = "") Set for Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setForIf($eq, string $for_data = "") Set parent for Attribute if $eq == true
     * @method string getFor() Get for Attribute
     * @method string _getFor() Get parent for Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setForm(string $form_data = "") Set form Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setForm(string $form_data = "") Set parent form Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setFormIf($eq, string $form_data = "") Set form Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setFormIf($eq, string $form_data = "") Set parent form Attribute if $eq == true
     * @method string getForm() Get form Attribute
     * @method string _getForm() Get parent form Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setFormaction(string $formaction_data = "") Set formaction Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setFormaction(string $formaction_data = "") Set parent formaction Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setFormactionIf($eq, string $formaction_data = "") Set formaction Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setFormactionIf($eq, string $formaction_data = "") Set parent formaction Attribute if $eq == true
     * @method string getFormaction() Get formaction Attribute
     * @method string _getFormaction() Get parent formaction Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setHeaders(string $headers_data = "") Set headers Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setHeaders(string $headers_data = "") Set parent headers Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setHeadersIf($eq, string $headers_data = "") Set headers Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setHeadersIf($eq, string $headers_data = "") Set parent headers Attribute if $eq == true
     * @method string getHeaders() Get headers Attribute
     * @method string _getHeaders() Get parent headers Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setHeight(string $height_data = "") Set height Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setHeight(string $height_data = "") Set parent height Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setHeightIf($eq, string $height_data = "") Set height Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setHeightIf($eq, string $height_data = "") Set parent height Attribute if $eq == true
     * @method string getHeight() Get height Attribute
     * @method string _getHeight() Get parent height Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setHidden(string $hidden_data = "") Set hidden Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setHidden(string $hidden_data = "") Set parent hidden Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setHiddenIf($eq, string $hidden_data = "") Set hidden Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setHiddenIf($eq, string $hidden_data = "") Set parent hidden Attribute if $eq == true
     * @method string getHidden() Get hidden Attribute
     * @method string _getHidden() Get parent hidden Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setHigh(string $high_data = "") Set high Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setHigh(string $high_data = "") Set parent high Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setHighIf($eq, string $high_data = "") Set high Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setHighIf($eq, string $high_data = "") Set parent high Attribute if $eq == true
     * @method string getHigh() Get high Attribute
     * @method string _getHigh() Get parent high Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setHref(string $href_data = "") Set href Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setHref(string $href_data = "") Set parent href Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setHrefIf($eq, string $href_data = "") Set href Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setHrefIf($eq, string $href_data = "") Set parent href Attribute if $eq == true
     * @method string getHref() Get href Attribute
     * @method string _getHref() Get parent href Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setHreflang(string $hreflang_data = "") Set hreflang Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setHreflang(string $hreflang_data = "") Set parent hreflang Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setHreflangIf($eq, string $hreflang_data = "") Set hreflang Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setHreflangIf($eq, string $hreflang_data = "") Set parent hreflang Attribute if $eq == true
     * @method string getHreflang() Get hreflang Attribute
     * @method string _getHreflang() Get parent hreflang Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setHttpEquiv(string $http_equiv_data = "") Set http_equiv Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setHttpEquiv(string $http_equiv_data = "") Set parent http_equiv Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setHttpEquivIf($eq, string $http_equiv_data = "") Set http_equiv Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setHttpEquivIf($eq, string $http_equiv_data = "") Set parent http_equiv Attribute if $eq == true
     * @method string getHttpEquiv() Get http_equiv Attribute
     * @method string _getHttpEquiv() Get parent http_equiv Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setId(string $id_data = "") Set id Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setId(string $id_data = "") Set parent id Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setIdIf($eq, string $id_data = "") Set id Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setIdIf($eq, string $id_data = "") Set parent id Attribute if $eq == true
     * @method string getId() Get id Attribute
     * @method string _getId() Get parent id Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setIsmap(string $ismap_data = "") Set ismap Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setIsmap(string $ismap_data = "") Set parent ismap Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setIsmapIf($eq, string $ismap_data = "") Set ismap Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setIsmapIf($eq, string $ismap_data = "") Set parent ismap Attribute if $eq == true
     * @method string getIsmap() Get ismap Attribute
     * @method string _getIsmap() Get parent ismap Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setKind(string $kind_data = "") Set kind Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setKind(string $kind_data = "") Set parent kind Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setKindIf($eq, string $kind_data = "") Set kind Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setKindIf($eq, string $kind_data = "") Set parent kind Attribute if $eq == true
     * @method string getKind() Get kind Attribute
     * @method string _getKind() Get parent kind Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setLabel(string $label_data = "") Set label Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setLabel(string $label_data = "") Set parent label Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setLabelIf($eq, string $label_data = "") Set label Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setLabelIf($eq, string $label_data = "") Set parent label Attribute if $eq == true
     * @method string getLabel() Get label Attribute
     * @method string _getLabel() Get parent label Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setLang(string $lang_data = "") Set lang Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setLang(string $lang_data = "") Set parent lang Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setLangIf($eq, string $lang_data = "") Set lang Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setLangIf($eq, string $lang_data = "") Set parent lang Attribute if $eq == true
     * @method string getLang() Get lang Attribute
     * @method string _getLang() Get parent lang Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setList(string $list_data = "") Set list Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setList(string $list_data = "") Set parent list Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setListIf($eq, string $list_data = "") Set list Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setListIf($eq, string $list_data = "") Set parent list Attribute if $eq == true
     * @method string getList() Get list Attribute
     * @method string _getList() Get parent list Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setLoop(string $loop_data = "") Set loop Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setLoop(string $loop_data = "") Set parent loop Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setLoopIf($eq, string $loop_data = "") Set loop Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setLoopIf($eq, string $loop_data = "") Set parent loop Attribute if $eq == true
     * @method string getLoop() Get loop Attribute
     * @method string _getLoop() Get parent loop Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setLow(string $low_data = "") Set low Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setLow(string $low_data = "") Set parent low Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setLowIf($eq, string $low_data = "") Set low Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setLowIf($eq, string $low_data = "") Set parent low Attribute if $eq == true
     * @method string getLow() Get low Attribute
     * @method string _getLow() Get parent low Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setMax(string $max_data = "") Set max Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setMax(string $max_data = "") Set parent max Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setMaxIf($eq, string $max_data = "") Set max Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setMaxIf($eq, string $max_data = "") Set parent max Attribute if $eq == true
     * @method string getMax() Get max Attribute
     * @method string _getMax() Get parent max Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setMaxlength(string $maxlength_data = "") Set maxlength Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setMaxlength(string $maxlength_data = "") Set parent maxlength Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setMaxlengthIf($eq, string $maxlength_data = "") Set maxlength Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setMaxlengthIf($eq, string $maxlength_data = "") Set parent maxlength Attribute if $eq == true
     * @method string getMaxlength() Get maxlength Attribute
     * @method string _getMaxlength() Get parent maxlength Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setMedia(string $media_data = "") Set media Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setMedia(string $media_data = "") Set parent media Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setMediaIf($eq, string $media_data = "") Set media Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setMediaIf($eq, string $media_data = "") Set parent media Attribute if $eq == true
     * @method string getMedia() Get media Attribute
     * @method string _getMedia() Get parent media Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setMethod(string $method_data = "") Set method Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setMethod(string $method_data = "") Set parent method Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setMethodIf($eq, string $method_data = "") Set method Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setMethodIf($eq, string $method_data = "") Set parent method Attribute if $eq == true
     * @method string getMethod() Get method Attribute
     * @method string _getMethod() Get parent method Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setMin(string $min_data = "") Set min Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setMin(string $min_data = "") Set parent min Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setMinIf($eq, string $min_data = "") Set min Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setMinIf($eq, string $min_data = "") Set parent min Attribute if $eq == true
     * @method string getMin() Get min Attribute
     * @method string _getMin() Get parent min Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setMultiple(string $multiple_data = "") Set multiple Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setMultiple(string $multiple_data = "") Set parent multiple Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setMultipleIf($eq, string $multiple_data = "") Set multiple Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setMultipleIf($eq, string $multiple_data = "") Set parent multiple Attribute if $eq == true
     * @method string getMultiple() Get multiple Attribute
     * @method string _getMultiple() Get parent multiple Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setMuted(string $muted_data = "") Set muted Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setMuted(string $muted_data = "") Set parent muted Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setMutedIf($eq, string $muted_data = "") Set muted Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setMutedIf($eq, string $muted_data = "") Set parent muted Attribute if $eq == true
     * @method string getMuted() Get muted Attribute
     * @method string _getMuted() Get parent muted Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setName(string $name_data = "") Set name Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setName(string $name_data = "") Set parent name Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setNameIf($eq, string $name_data = "") Set name Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setNameIf($eq, string $name_data = "") Set parent name Attribute if $eq == true
     * @method string getName() Get name Attribute
     * @method string _getName() Get parent name Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setNovalidate(string $novalidate_data = "") Set novalidate Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setNovalidate(string $novalidate_data = "") Set parent novalidate Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setNovalidateIf($eq, string $novalidate_data = "") Set novalidate Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setNovalidateIf($eq, string $novalidate_data = "") Set parent novalidate Attribute if $eq == true
     * @method string getNovalidate() Get novalidate Attribute
     * @method string _getNovalidate() Get parent novalidate Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setOpen(string $open_data = "") Set open Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setOpen(string $open_data = "") Set parent open Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setOpenIf($eq, string $open_data = "") Set open Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setOpenIf($eq, string $open_data = "") Set parent open Attribute if $eq == true
     * @method string getOpen() Get open Attribute
     * @method string _getOpen() Get parent open Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setOptimum(string $optimum_data = "") Set optimum Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setOptimum(string $optimum_data = "") Set parent optimum Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setOptimumIf($eq, string $optimum_data = "") Set optimum Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setOptimumIf($eq, string $optimum_data = "") Set parent optimum Attribute if $eq == true
     * @method string getOptimum() Get optimum Attribute
     * @method string _getOptimum() Get parent optimum Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setPattern(string $pattern_data = "") Set pattern Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setPattern(string $pattern_data = "") Set parent pattern Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setPatternIf($eq, string $pattern_data = "") Set pattern Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setPatternIf($eq, string $pattern_data = "") Set parent pattern Attribute if $eq == true
     * @method string getPattern() Get pattern Attribute
     * @method string _getPattern() Get parent pattern Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setPlaceholder(string $placeholder_data = "") Set placeholder Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setPlaceholder(string $placeholder_data = "") Set parent placeholder Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setPlaceholderIf($eq, string $placeholder_data = "") Set placeholder Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setPlaceholderIf($eq, string $placeholder_data = "") Set parent placeholder Attribute if $eq == true
     * @method string getPlaceholder() Get placeholder Attribute
     * @method string _getPlaceholder() Get parent placeholder Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setPoster(string $poster_data = "") Set poster Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setPoster(string $poster_data = "") Set parent poster Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setPosterIf($eq, string $poster_data = "") Set poster Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setPosterIf($eq, string $poster_data = "") Set parent poster Attribute if $eq == true
     * @method string getPoster() Get poster Attribute
     * @method string _getPoster() Get parent poster Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setPreload(string $preload_data = "") Set preload Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setPreload(string $preload_data = "") Set parent preload Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setPreloadIf($eq, string $preload_data = "") Set preload Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setPreloadIf($eq, string $preload_data = "") Set parent preload Attribute if $eq == true
     * @method string getPreload() Get preload Attribute
     * @method string _getPreload() Get parent preload Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setReadonly(string $readonly_data = "") Set readonly Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setReadonly(string $readonly_data = "") Set parent readonly Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setReadonlyIf($eq, string $readonly_data = "") Set readonly Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setReadonlyIf($eq, string $readonly_data = "") Set parent readonly Attribute if $eq == true
     * @method string getReadonly() Get readonly Attribute
     * @method string _getReadonly() Get parent readonly Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setRel(string $rel_data = "") Set rel Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setRel(string $rel_data = "") Set parent rel Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setRelIf($eq, string $rel_data = "") Set rel Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setRelIf($eq, string $rel_data = "") Set parent rel Attribute if $eq == true
     * @method string getRel() Get rel Attribute
     * @method string _getRel() Get parent rel Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setRequired(string $required_data = "") Set required Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setRequired(string $required_data = "") Set parent required Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setRequiredIf($eq, string $required_data = "") Set required Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setRequiredIf($eq, string $required_data = "") Set parent required Attribute if $eq == true
     * @method string getRequired() Get required Attribute
     * @method string _getRequired() Get parent required Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setReversed(string $reversed_data = "") Set reversed Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setReversed(string $reversed_data = "") Set parent reversed Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setReversedIf($eq, string $reversed_data = "") Set reversed Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setReversedIf($eq, string $reversed_data = "") Set parent reversed Attribute if $eq == true
     * @method string getReversed() Get reversed Attribute
     * @method string _getReversed() Get parent reversed Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setRole(string $role_data = "") Set role Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setRole(string $role_data = "") Set parent role Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setRoleIf($eq, string $role_data = "") Set role Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setRoleIf($eq, string $role_data = "") Set parent role Attribute if $eq == true
     * @method string getRole() Get role Attribute
     * @method string _getRole() Get parent role Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setRows(string $rows_data = "") Set rows Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setRows(string $rows_data = "") Set parent rows Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setRowsIf($eq, string $rows_data = "") Set rows Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setRowsIf($eq, string $rows_data = "") Set parent rows Attribute if $eq == true
     * @method string getRows() Get rows Attribute
     * @method string _getRows() Get parent rows Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setRowspan(string $rowspan_data = "") Set rowspan Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setRowspan(string $rowspan_data = "") Set parent rowspan Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setRowspanIf($eq, string $rowspan_data = "") Set rowspan Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setRowspanIf($eq, string $rowspan_data = "") Set parent rowspan Attribute if $eq == true
     * @method string getRowspan() Get rowspan Attribute
     * @method string _getRowspan() Get parent rowspan Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSandbox(string $sandbox_data = "") Set sandbox Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setSandbox(string $sandbox_data = "") Set parent sandbox Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSandboxIf($eq, string $sandbox_data = "") Set sandbox Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setSandboxIf($eq, string $sandbox_data = "") Set parent sandbox Attribute if $eq == true
     * @method string getSandbox() Get sandbox Attribute
     * @method string _getSandbox() Get parent sandbox Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setScope(string $scope_data = "") Set scope Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setScope(string $scope_data = "") Set parent scope Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setScopeIf($eq, string $scope_data = "") Set scope Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setScopeIf($eq, string $scope_data = "") Set parent scope Attribute if $eq == true
     * @method string getScope() Get scope Attribute
     * @method string _getScope() Get parent scope Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSelected(string $selected_data = "") Set selected Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setSelected(string $selected_data = "") Set parent selected Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSelectedIf($eq, string $selected_data = "") Set selected Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setSelectedIf($eq, string $selected_data = "") Set parent selected Attribute if $eq == true
     * @method string getSelected() Get selected Attribute
     * @method string _getSelected() Get parent selected Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setShape(string $shape_data = "") Set shape Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setShape(string $shape_data = "") Set parent shape Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setShapeIf($eq, string $shape_data = "") Set shape Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setShapeIf($eq, string $shape_data = "") Set parent shape Attribute if $eq == true
     * @method string getShape() Get shape Attribute
     * @method string _getShape() Get parent shape Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSize(string $size_data = "") Set size Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setSize(string $size_data = "") Set parent size Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSizeIf($eq, string $size_data = "") Set size Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setSizeIf($eq, string $size_data = "") Set parent size Attribute if $eq == true
     * @method string getSize() Get size Attribute
     * @method string _getSize() Get parent size Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSizes(string $sizes_data = "") Set sizes Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setSizes(string $sizes_data = "") Set parent sizes Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSizesIf($eq, string $sizes_data = "") Set sizes Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setSizesIf($eq, string $sizes_data = "") Set parent sizes Attribute if $eq == true
     * @method string getSizes() Get sizes Attribute
     * @method string _getSizes() Get parent sizes Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSpan(string $span_data = "") Set span Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setSpan(string $span_data = "") Set parent span Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSpanIf($eq, string $span_data = "") Set span Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setSpanIf($eq, string $span_data = "") Set parent span Attribute if $eq == true
     * @method string getSpan() Get span Attribute
     * @method string _getSpan() Get parent span Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSpellcheck(string $spellcheck_data = "") Set spellcheck Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setSpellcheck(string $spellcheck_data = "") Set parent spellcheck Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSpellcheckIf($eq, string $spellcheck_data = "") Set spellcheck Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setSpellcheckIf($eq, string $spellcheck_data = "") Set parent spellcheck Attribute if $eq == true
     * @method string getSpellcheck() Get spellcheck Attribute
     * @method string _getSpellcheck() Get parent spellcheck Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSrc(string $src_data = "") Set src Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setSrc(string $src_data = "") Set parent src Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSrcIf($eq, string $src_data = "") Set src Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setSrcIf($eq, string $src_data = "") Set parent src Attribute if $eq == true
     * @method string getSrc() Get src Attribute
     * @method string _getSrc() Get parent src Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSrcdoc(string $srcdoc_data = "") Set srcdoc Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setSrcdoc(string $srcdoc_data = "") Set parent srcdoc Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSrcdocIf($eq, string $srcdoc_data = "") Set srcdoc Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setSrcdocIf($eq, string $srcdoc_data = "") Set parent srcdoc Attribute if $eq == true
     * @method string getSrcdoc() Get srcdoc Attribute
     * @method string _getSrcdoc() Get parent srcdoc Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSrclang(string $srclang_data = "") Set srclang Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setSrclang(string $srclang_data = "") Set parent srclang Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSrclangIf($eq, string $srclang_data = "") Set srclang Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setSrclangIf($eq, string $srclang_data = "") Set parent srclang Attribute if $eq == true
     * @method string getSrclang() Get srclang Attribute
     * @method string _getSrclang() Get parent srclang Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSrcset(string $srcset_data = "") Set srcset Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setSrcset(string $srcset_data = "") Set parent srcset Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setSrcsetIf($eq, string $srcset_data = "") Set srcset Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setSrcsetIf($eq, string $srcset_data = "") Set parent srcset Attribute if $eq == true
     * @method string getSrcset() Get srcset Attribute
     * @method string _getSrcset() Get parent srcset Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setStart(string $start_data = "") Set start Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setStart(string $start_data = "") Set parent start Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setStartIf($eq, string $start_data = "") Set start Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setStartIf($eq, string $start_data = "") Set parent start Attribute if $eq == true
     * @method string getStart() Get start Attribute
     * @method string _getStart() Get parent start Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setStep(string $step_data = "") Set step Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setStep(string $step_data = "") Set parent step Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setStepIf($eq, string $step_data = "") Set step Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setStepIf($eq, string $step_data = "") Set parent step Attribute if $eq == true
     * @method string getStep() Get step Attribute
     * @method string _getStep() Get parent step Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setStyle(string $style_data = "") Set style Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setStyle(string $style_data = "") Set parent style Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setStyleIf($eq, string $style_data = "") Set style Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setStyleIf($eq, string $style_data = "") Set parent style Attribute if $eq == true
     * @method string getStyle() Get style Attribute
     * @method string _getStyle() Get parent style Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setTabindex(string $tabindex_data = "") Set tabindex Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setTabindex(string $tabindex_data = "") Set parent tabindex Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setTabindexIf($eq, string $tabindex_data = "") Set tabindex Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setTabindexIf($eq, string $tabindex_data = "") Set parent tabindex Attribute if $eq == true
     * @method string getTabindex() Get tabindex Attribute
     * @method string _getTabindex() Get parent tabindex Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setTarget(string $target_data = "") Set target Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setTarget(string $target_data = "") Set parent target Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setTargetIf($eq, string $target_data = "") Set target Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setTargetIf($eq, string $target_data = "") Set parent target Attribute if $eq == true
     * @method string getTarget() Get target Attribute
     * @method string _getTarget() Get parent target Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setTitle(string $title_data = "") Set title Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setTitle(string $title_data = "") Set parent title Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setTitleIf($eq, string $title_data = "") Set title Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setTitleIf($eq, string $title_data = "") Set parent title Attribute if $eq == true
     * @method string getTitle() Get title Attribute
     * @method string _getTitle() Get parent title Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setTranslate(string $translate_data = "") Set translate Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setTranslate(string $translate_data = "") Set parent translate Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setTranslateIf($eq, string $translate_data = "") Set translate Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setTranslateIf($eq, string $translate_data = "") Set parent translate Attribute if $eq == true
     * @method string getTranslate() Get translate Attribute
     * @method string _getTranslate() Get parent translate Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setType(string $type_data = "") Set type Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setType(string $type_data = "") Set parent type Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setTypeIf($eq, string $type_data = "") Set type Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setTypeIf($eq, string $type_data = "") Set parent type Attribute if $eq == true
     * @method string getType() Get type Attribute
     * @method string _getType() Get parent type Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setUsemap(string $usemap_data = "") Set usemap Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setUsemap(string $usemap_data = "") Set parent usemap Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setUsemapIf($eq, string $usemap_data = "") Set usemap Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setUsemapIf($eq, string $usemap_data = "") Set parent usemap Attribute if $eq == true
     * @method string getUsemap() Get usemap Attribute
     * @method string _getUsemap() Get parent usemap Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setValue(string $value_data = "") Set value Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setValue(string $value_data = "") Set parent value Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setValueIf($eq, string $value_data = "") Set value Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setValueIf($eq, string $value_data = "") Set parent value Attribute if $eq == true
     * @method string getValue() Get value Attribute
     * @method string _getValue() Get parent value Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setWidth(string $width_data = "") Set width Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setWidth(string $width_data = "") Set parent width Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setWidthIf($eq, string $width_data = "") Set width Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setWidthIf($eq, string $width_data = "") Set parent width Attribute if $eq == true
     * @method string getWidth() Get width Attribute
     * @method string _getWidth() Get parent width Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setWrap(string $wrap_data = "") Set wrap Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _setWrap(string $wrap_data = "") Set parent wrap Attribute
     * @method self|static|\Lar\Layout\Abstracts\Component setWrapIf($eq, string $wrap_data = "") Set wrap Attribute if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _setWrapIf($eq, string $wrap_data = "") Set parent wrap Attribute if $eq == true
     * @method string getWrap() Get wrap Attribute
     * @method string _getWrap() Get parent wrap Attribute
     * @method \App\Components\Vue\Pages\Auth pages_auth($id = null, array $attrs = [], ...$params) Add Component pages_auth
     * @method \App\Components\Vue\Pages\Auth _pages_auth($id = null, array $attrs = [], ...$params) Add Component pages_auth to parent
     * @method \App\Components\Vue\Pages\Home pages_home($id = null, array $attrs = [], ...$params) Add Component pages_home
     * @method \App\Components\Vue\Pages\Home _pages_home($id = null, array $attrs = [], ...$params) Add Component pages_home to parent
     * @method \App\Components\Vue\Pages\FAQ pages_f_a_q($id = null, array $attrs = [], ...$params) Add Component pages_f_a_q
     * @method \App\Components\Vue\Pages\FAQ _pages_f_a_q($id = null, array $attrs = [], ...$params) Add Component pages_f_a_q to parent
     * @method \App\Components\Vue\Pages\Rule pages_rule($id = null, array $attrs = [], ...$params) Add Component pages_rule
     * @method \App\Components\Vue\Pages\Rule _pages_rule($id = null, array $attrs = [], ...$params) Add Component pages_rule to parent
     * @method \App\Components\Vue\Pages\Support pages_support($id = null, array $attrs = [], ...$params) Add Component pages_support
     * @method \App\Components\Vue\Pages\Support _pages_support($id = null, array $attrs = [], ...$params) Add Component pages_support to parent
     * @method \App\Components\Vue\Common\Footer common_footer($id = null, array $attrs = [], ...$params) Add Component common_footer
     * @method \App\Components\Vue\Common\Footer _common_footer($id = null, array $attrs = [], ...$params) Add Component common_footer to parent
     * @method \App\Components\Vue\Common\Header common_header($id = null, array $attrs = [], ...$params) Add Component common_header
     * @method \App\Components\Vue\Common\Header _common_header($id = null, array $attrs = [], ...$params) Add Component common_header to parent
     * @method \App\Components\Vue\Pages\Direction pages_direction($id = null, array $attrs = [], ...$params) Add Component pages_direction
     * @method \App\Components\Vue\Pages\Direction _pages_direction($id = null, array $attrs = [], ...$params) Add Component pages_direction to parent
     * @method \App\Components\Vue\Pages\Task pages_task($id = null, array $attrs = [], ...$params) Add Component pages_task
     * @method \App\Components\Vue\Pages\Task _pages_task($id = null, array $attrs = [], ...$params) Add Component pages_task to parent
     * @method \App\Components\Vue\Pages\NewPassword pages_new_password($id = null, array $attrs = [], ...$params) Add Component pages_new_password
     * @method \App\Components\Vue\Pages\NewPassword _pages_new_password($id = null, array $attrs = [], ...$params) Add Component pages_new_password to parent
     * @method \App\Components\Vue\Pages\Product pages_product($id = null, array $attrs = [], ...$params) Add Component pages_product
     * @method \App\Components\Vue\Pages\Product _pages_product($id = null, array $attrs = [], ...$params) Add Component pages_product to parent
     * @method \App\Components\Vue\Pages\Profile pages_profile($id = null, array $attrs = [], ...$params) Add Component pages_profile
     * @method \App\Components\Vue\Pages\Profile _pages_profile($id = null, array $attrs = [], ...$params) Add Component pages_profile to parent
     * @method \App\Components\Vue\Pages\User pages_user($id = null, array $attrs = [], ...$params) Add Component pages_user
     * @method \App\Components\Vue\Pages\User _pages_user($id = null, array $attrs = [], ...$params) Add Component pages_user to parent
     * @method \App\Components\Vue\Pages\GuestSupport pages_guest_support($id = null, array $attrs = [], ...$params) Add Component pages_guest_support
     * @method \App\Components\Vue\Pages\GuestSupport _pages_guest_support($id = null, array $attrs = [], ...$params) Add Component pages_guest_support to parent
     * @method \App\Components\Vue\Pages\Search pages_search($id = null, array $attrs = [], ...$params) Add Component pages_search
     * @method \App\Components\Vue\Pages\Search _pages_search($id = null, array $attrs = [], ...$params) Add Component pages_search to parent
     * @method \App\Components\Vue\Pages\Table pages_table($id = null, array $attrs = [], ...$params) Add Component pages_table
     * @method \App\Components\Vue\Pages\Table _pages_table($id = null, array $attrs = [], ...$params) Add Component pages_table to parent
     * @method \Lar\LteAdmin\Segments\Tagable\Row row(...$params) Add Component row
     * @method \Lar\LteAdmin\Segments\Tagable\Row _row(...$params) Add Component row to parent
     * @method \Lar\LteAdmin\Segments\Tagable\Col col($num = null, ...$params) Add Component col
     * @method \Lar\LteAdmin\Segments\Tagable\Col _col($num = null, ...$params) Add Component col to parent
     * @method \Lar\LteAdmin\Segments\Tagable\Lang lang(array $lang_list = null, ...$params) Add Component lang
     * @method \Lar\LteAdmin\Segments\Tagable\Lang _lang(array $lang_list = null, ...$params) Add Component lang to parent
     * @method \Lar\LteAdmin\Segments\Tagable\Card card($title = null, ...$params) Add Component card
     * @method \Lar\LteAdmin\Segments\Tagable\Card _card($title = null, ...$params) Add Component card to parent
     * @method \Lar\LteAdmin\Segments\Tagable\Form form($model = null, ...$params) Add Component form
     * @method \Lar\LteAdmin\Segments\Tagable\Form _form($model = null, ...$params) Add Component form to parent
     * @method \Lar\LteAdmin\Segments\Tagable\FormFooter form_footer($nav_redirect = true, ...$params) Add Component form_footer
     * @method \Lar\LteAdmin\Segments\Tagable\FormFooter _form_footer($nav_redirect = true, ...$params) Add Component form_footer to parent
     * @method \Lar\LteAdmin\Segments\Tagable\Field field(...$params) Add Component field
     * @method \Lar\LteAdmin\Segments\Tagable\Field _field(...$params) Add Component field to parent
     * @method \Lar\LteAdmin\Segments\Tagable\ModelTable model_table($model = null, ...$params) Add Component model_table
     * @method \Lar\LteAdmin\Segments\Tagable\ModelTable _model_table($model = null, ...$params) Add Component model_table to parent
     * @method \Lar\LteAdmin\Segments\Tagable\ModelInfoTable model_info_table($model = null, ...$params) Add Component model_info_table
     * @method \Lar\LteAdmin\Segments\Tagable\ModelInfoTable _model_info_table($model = null, ...$params) Add Component model_info_table to parent
     * @method \Lar\LteAdmin\Segments\Tagable\Table table($rows, ...$params) Add Component table
     * @method \Lar\LteAdmin\Segments\Tagable\Table _table($rows, ...$params) Add Component table to parent
     * @method \Lar\LteAdmin\Segments\Tagable\ButtonGroup button_group(...$params) Add Component button_group
     * @method \Lar\LteAdmin\Segments\Tagable\ButtonGroup _button_group(...$params) Add Component button_group to parent
     * @method \Lar\LteAdmin\Segments\Tagable\Alert alert(string $title = null, $body = "", string $icon = null, ...$params) Add Component alert
     * @method \Lar\LteAdmin\Segments\Tagable\Alert _alert(string $title = null, $body = "", string $icon = null, ...$params) Add Component alert to parent
     * @method \Lar\LteAdmin\Segments\Tagable\SmallBox small_box(string $title = null, $body = "", string $icon = "fas fa-info-circle", ...$params) Add Component small_box
     * @method \Lar\LteAdmin\Segments\Tagable\SmallBox _small_box(string $title = null, $body = "", string $icon = "fas fa-info-circle", ...$params) Add Component small_box to parent
     * @method \Lar\LteAdmin\Segments\Tagable\InfoBox info_box(string $title = null, $body = "", string $icon = "fas fa-info-circle", ...$params) Add Component info_box
     * @method \Lar\LteAdmin\Segments\Tagable\InfoBox _info_box(string $title = null, $body = "", string $icon = "fas fa-info-circle", ...$params) Add Component info_box to parent
     * @method \Lar\LteAdmin\Segments\Tagable\Tabs tabs(...$params) Add Component tabs
     * @method \Lar\LteAdmin\Segments\Tagable\Tabs _tabs(...$params) Add Component tabs to parent
     * @method \Lar\LteAdmin\Segments\Tagable\Nested nested($model = null, $instructions = [], ...$params) Add Component nested
     * @method \Lar\LteAdmin\Segments\Tagable\Nested _nested($model = null, $instructions = [], ...$params) Add Component nested to parent
     * @method \Lar\LteAdmin\Segments\Tagable\Divider divider($left_title = null, $center_title = null, $right_title = null, ...$params) Add Component divider
     * @method \Lar\LteAdmin\Segments\Tagable\Divider _divider($left_title = null, $center_title = null, $right_title = null, ...$params) Add Component divider to parent
     * @method \Lar\LteAdmin\Segments\Tagable\Live live($condition, ...$params) Add Component live
     * @method \Lar\LteAdmin\Segments\Tagable\Live _live($condition, ...$params) Add Component live to parent
     * @method \Lar\LteAdmin\Segments\Tagable\ModelLive model_live(string $path, $need_value, ...$params) Add Component model_live
     * @method \Lar\LteAdmin\Segments\Tagable\ModelLive _model_live(string $path, $need_value, ...$params) Add Component model_live to parent
     * @method \Lar\LteAdmin\Segments\Tagable\ModelRelation model_relation($relation, $instructions, callable $content = null, ...$params) Add Component model_relation
     * @method \Lar\LteAdmin\Segments\Tagable\ModelRelation _model_relation($relation, $instructions, callable $content = null, ...$params) Add Component model_relation to parent
     * @method self|static|\Lar\Layout\Abstracts\Component vue()
     * @method self|static|\Lar\Layout\Abstracts\Component _vue() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component initTag($element) Tag initialize
     * @method self|static|\Lar\Layout\Abstracts\Component _initTag($element) Apply to parent. Tag initialize
     * @method self|static|\Lar\Layout\Abstracts\Component unregister()
     * @method self|static|\Lar\Layout\Abstracts\Component _unregister() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component newContentCollection($collect = null)
     * @method self|static|\Lar\Layout\Abstracts\Component _newContentCollection($collect = null) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component|\Lar\Tagable\Core\ContentCollectionArea contentCollection()
     * @method self|static|\Lar\Layout\Abstracts\Component|\Lar\Tagable\Core\ContentCollectionArea _contentCollection() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component setElement(string $element)
     * @method self|static|\Lar\Layout\Abstracts\Component _setElement(string $element) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component|mixed if_there_is_a_component($name, $arguments)
     * @method self|static|\Lar\Layout\Abstracts\Component|mixed _if_there_is_a_component($name, $arguments) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component|mixed if_there_is_a_group($name, $arguments)
     * @method self|static|\Lar\Layout\Abstracts\Component|mixed _if_there_is_a_group($name, $arguments) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component if_there_is_a_class_setting_pattern_with_a_condition($arguments, $matches)
     * @method self|static|\Lar\Layout\Abstracts\Component _if_there_is_a_class_setting_pattern_with_a_condition($arguments, $matches) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component if_there_is_a_class_setting_pattern($arguments, $matches)
     * @method self|static|\Lar\Layout\Abstracts\Component _if_there_is_a_class_setting_pattern($arguments, $matches) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component if_the_declared_attribute_is_found_with_the_condition($arguments, array $matches)
     * @method self|static|\Lar\Layout\Abstracts\Component _if_the_declared_attribute_is_found_with_the_condition($arguments, array $matches) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component if_the_declared_attribute_is_found($arguments, array $matches)
     * @method self|static|\Lar\Layout\Abstracts\Component _if_the_declared_attribute_is_found($arguments, array $matches) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component|\Lar\Tagable\Core\ContentCollectionArea bottomContent()
     * @method self|static|\Lar\Layout\Abstracts\Component|\Lar\Tagable\Core\ContentCollectionArea _bottomContent() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component|array getMacros()
     * @method self|static|\Lar\Layout\Abstracts\Component|array _getMacros() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component cacheCollect() Cache dom collection
     * @method self|static|\Lar\Layout\Abstracts\Component _cacheCollect() Apply to parent. Cache dom collection
     * @method self|static|\Lar\Layout\Abstracts\Component restoreCollectFromCache() Restore tag collection
     * @method self|static|\Lar\Layout\Abstracts\Component _restoreCollectFromCache() Apply to parent. Restore tag collection
     * @method self|static|\Lar\Layout\Abstracts\Component resetCollect() Reset collection
     * @method self|static|\Lar\Layout\Abstracts\Component _resetCollect() Apply to parent. Reset collection
     * @method self|static|\Lar\Layout\Abstracts\Component|\Illuminate\Support\Collection|\Lar\Tagable\Core\FindCollection selector(string $selector) Selector
     * @method self|static|\Lar\Layout\Abstracts\Component|\Illuminate\Support\Collection|\Lar\Tagable\Core\FindCollection _selector(string $selector) Apply to parent. Selector
     * @method self|static|\Lar\Layout\Abstracts\Component addName(string $name, \Lar\Tagable\Tag $tag) Add tag width name
     * @method self|static|\Lar\Layout\Abstracts\Component _addName(string $name, \Lar\Tagable\Tag $tag) Apply to parent. Add tag width name
     * @method self|static|\Lar\Layout\Abstracts\Component|array getCaller($offset = 0) Get Caller
     * @method self|static|\Lar\Layout\Abstracts\Component|array _getCaller($offset = 0) Apply to parent. Get Caller
     * @method self|static|\Lar\Layout\Abstracts\Component|Tag|static cover() Static alias from method when
     * @method self|static|\Lar\Layout\Abstracts\Component|Tag|static _cover() Apply to parent. Static alias from method when
     * @method self|static|\Lar\Layout\Abstracts\Component registerComponent(string $name, $component) Registration component
     * @method self|static|\Lar\Layout\Abstracts\Component _registerComponent(string $name, $component) Apply to parent. Registration component
     * @method self|static|\Lar\Layout\Abstracts\Component|\Illuminate\Support\Collection getComponents()
     * @method self|static|\Lar\Layout\Abstracts\Component|\Illuminate\Support\Collection _getComponents() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component|bool hasComponent(string $name)
     * @method self|static|\Lar\Layout\Abstracts\Component|bool _hasComponent(string $name) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component injectFile($file) Inject collection from file
     * @method self|static|\Lar\Layout\Abstracts\Component _injectFile($file) Apply to parent. Inject collection from file
     * @method self|static|\Lar\Layout\Abstracts\Component injectCollection($collection = [], $complex = false) Inject collection in to component collection
     * @method self|static|\Lar\Layout\Abstracts\Component _injectCollection($collection = [], $complex = false) Apply to parent. Inject collection in to component collection
     * @method self|static|\Lar\Layout\Abstracts\Component|mixed getComponent(string $name) Component getter
     * @method self|static|\Lar\Layout\Abstracts\Component|mixed _getComponent(string $name) Apply to parent. Component getter
     * @method self|static|\Lar\Layout\Abstracts\Component create(...$data) Static create
     * @method self|static|\Lar\Layout\Abstracts\Component _create(...$data) Apply to parent. Static create
     * @method self|static|\Lar\Layout\Abstracts\Component|bool isTsElement(string $element)
     * @method self|static|\Lar\Layout\Abstracts\Component|bool _isTsElement(string $element) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component|bool isClosingTag()
     * @method self|static|\Lar\Layout\Abstracts\Component|bool _isClosingTag() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component|bool isDebug() Is debug mode
     * @method self|static|\Lar\Layout\Abstracts\Component|bool _isDebug() Apply to parent. Is debug mode
     * @method self|static|\Lar\Layout\Abstracts\Component|bool isRendered() Is rendered element
     * @method self|static|\Lar\Layout\Abstracts\Component|bool _isRendered() Apply to parent. Is rendered element
     * @method self|static|\Lar\Layout\Abstracts\Component|bool isChanged() Check change status
     * @method self|static|\Lar\Layout\Abstracts\Component|bool _isChanged() Apply to parent. Check change status
     * @method self|static|\Lar\Layout\Abstracts\Component|bool isBottom() Check is bottom mode
     * @method self|static|\Lar\Layout\Abstracts\Component|bool _isBottom() Apply to parent. Check is bottom mode
     * @method self|static|\Lar\Layout\Abstracts\Component|bool isElement() Is tag initialization
     * @method self|static|\Lar\Layout\Abstracts\Component|bool _isElement() Apply to parent. Is tag initialization
     * @method self|static|\Lar\Layout\Abstracts\Component|bool hasJs() Has JS
     * @method self|static|\Lar\Layout\Abstracts\Component|bool _hasJs() Apply to parent. Has JS
     * @method self|static|\Lar\Layout\Abstracts\Component|bool hasClass(string $class)
     * @method self|static|\Lar\Layout\Abstracts\Component|bool _hasClass(string $class) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component|mixed hasAttribute(string $attribute)
     * @method self|static|\Lar\Layout\Abstracts\Component|mixed _hasAttribute(string $attribute) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component|bool hasParent() Has parent check
     * @method self|static|\Lar\Layout\Abstracts\Component|bool _hasParent() Apply to parent. Has parent check
     * @method self|static|\Lar\Layout\Abstracts\Component|bool ifAttribute($attr, $value) If attribute equal to value
     * @method self|static|\Lar\Layout\Abstracts\Component|bool _ifAttribute($attr, $value) Apply to parent. If attribute equal to value
     * @method self|static|\Lar\Layout\Abstracts\Component|bool|array compareWithCache() Compare tag with cache
     * @method self|static|\Lar\Layout\Abstracts\Component|bool|array _compareWithCache() Apply to parent. Compare tag with cache
     * @method self|static|\Lar\Layout\Abstracts\Component|array compareHashes($comparable_hashes = []) Compare hashes
     * @method self|static|\Lar\Layout\Abstracts\Component|array _compareHashes($comparable_hashes = []) Apply to parent. Compare hashes
     * @method self|static|\Lar\Layout\Abstracts\Component|null|string componentName() Get component name
     * @method self|static|\Lar\Layout\Abstracts\Component|null|string _componentName() Apply to parent. Get component name
     * @method self|static|\Lar\Layout\Abstracts\Component|array getJS() JS init list
     * @method self|static|\Lar\Layout\Abstracts\Component|array _getJS() Apply to parent. JS init list
     * @method self|static|\Lar\Layout\Abstracts\Component|\Lar\LJS\LJS js() JS Core
     * @method self|static|\Lar\Layout\Abstracts\Component|\Lar\LJS\LJS _js() Apply to parent. JS Core
     * @method self|static|\Lar\Layout\Abstracts\Component|\Illuminate\Support\Collection storage() Storage accessor
     * @method self|static|\Lar\Layout\Abstracts\Component|\Illuminate\Support\Collection _storage() Apply to parent. Storage accessor
     * @method self|static|\Lar\Layout\Abstracts\Component|string haveAndGetSelector() Create and get JSQuery selector
     * @method self|static|\Lar\Layout\Abstracts\Component|string _haveAndGetSelector() Apply to parent. Create and get JSQuery selector
     * @method self|static|\Lar\Layout\Abstracts\Component|string haveAndGetSelectorID() Create Or Get ID and return JSQuery selector
     * @method self|static|\Lar\Layout\Abstracts\Component|string _haveAndGetSelectorID() Apply to parent. Create Or Get ID and return JSQuery selector
     * @method self|static|\Lar\Layout\Abstracts\Component|string getSelector() Selector getter
     * @method self|static|\Lar\Layout\Abstracts\Component|string _getSelector() Apply to parent. Selector getter
     * @method self|static|\Lar\Layout\Abstracts\Component|string getObjName() Component name getter
     * @method self|static|\Lar\Layout\Abstracts\Component|string _getObjName() Apply to parent. Component name getter
     * @method self|static|\Lar\Layout\Abstracts\Component|string getElement() Element getter
     * @method self|static|\Lar\Layout\Abstracts\Component|string _getElement() Apply to parent. Element getter
     * @method self|static|\Lar\Layout\Abstracts\Component getParent() Parent getter
     * @method self|static|\Lar\Layout\Abstracts\Component _getParent() Apply to parent. Parent getter
     * @method self|static|\Lar\Layout\Abstracts\Component getRoot() Get root parent
     * @method self|static|\Lar\Layout\Abstracts\Component _getRoot() Apply to parent. Get root parent
     * @method self|static|\Lar\Layout\Abstracts\Component|int getChildElementCount() Get child element count
     * @method self|static|\Lar\Layout\Abstracts\Component|int _getChildElementCount() Apply to parent. Get child element count
     * @method self|static|\Lar\Layout\Abstracts\Component|string getRendered() Get render data
     * @method self|static|\Lar\Layout\Abstracts\Component|string _getRendered() Apply to parent. Get render data
     * @method self|static|\Lar\Layout\Abstracts\Component|string|array|bool getAttribute(string $attribute) Get attribute value
     * @method self|static|\Lar\Layout\Abstracts\Component|string|array|bool _getAttribute(string $attribute) Apply to parent. Get attribute value
     * @method self|static|\Lar\Layout\Abstracts\Component () Parent link
     * @method self|static|\Lar\Layout\Abstracts\Component _() Apply to parent. Parent link
     * @method self|static|\Lar\Layout\Abstracts\Component|string n_id() Auto create normal id
     * @method self|static|\Lar\Layout\Abstracts\Component|string _n_id() Apply to parent. Auto create normal id
     * @method self|static|\Lar\Layout\Abstracts\Component|string super_name() Generate and get super name
     * @method self|static|\Lar\Layout\Abstracts\Component|string _super_name() Apply to parent. Generate and get super name
     * @method self|static|\Lar\Layout\Abstracts\Component|array getExternalLink(array $params = []) Get external link to the object
     * @method self|static|\Lar\Layout\Abstracts\Component|array _getExternalLink(array $params = []) Apply to parent. Get external link to the object
     * @method self|static|\Lar\Layout\Abstracts\Component|string handler_name() Handler root name getter
     * @method self|static|\Lar\Layout\Abstracts\Component|string _handler_name() Apply to parent. Handler root name getter
     * @method self|static|\Lar\Layout\Abstracts\Component|string getHandlerName() Handler name getter
     * @method self|static|\Lar\Layout\Abstracts\Component|string _getHandlerName() Apply to parent. Handler name getter
     * @method self|static|\Lar\Layout\Abstracts\Component|string getUnique() Get unique identifier
     * @method self|static|\Lar\Layout\Abstracts\Component|string _getUnique() Apply to parent. Get unique identifier
     * @method self|static|\Lar\Layout\Abstracts\Component|array getHashes() Get tag hashes
     * @method self|static|\Lar\Layout\Abstracts\Component|array _getHashes() Apply to parent. Get tag hashes
     * @method self|static|\Lar\Layout\Abstracts\Component|string getRenderContent() Render content getter
     * @method self|static|\Lar\Layout\Abstracts\Component|string _getRenderContent() Apply to parent. Render content getter
     * @method self|static|\Lar\Layout\Abstracts\Component root($call) Root wrapper
     * @method self|static|\Lar\Layout\Abstracts\Component _root($call) Apply to parent. Root wrapper
     * @method self|static|\Lar\Layout\Abstracts\Component|string getNeedlePattern(string $attributes, string $content) Inner render helper
     * @method self|static|\Lar\Layout\Abstracts\Component|string _getNeedlePattern(string $attributes, string $content) Apply to parent. Inner render helper
     * @method self|static|\Lar\Layout\Abstracts\Component|string element_closer()
     * @method self|static|\Lar\Layout\Abstracts\Component|string _element_closer() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component|int contentCount()
     * @method self|static|\Lar\Layout\Abstracts\Component|int _contentCount() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component|mixed last()
     * @method self|static|\Lar\Layout\Abstracts\Component|mixed _last() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component find(string $selector) Find tags in content
     * @method self|static|\Lar\Layout\Abstracts\Component _find(string $selector) Apply to parent. Find tags in content
     * @method self|static|\Lar\Layout\Abstracts\Component attrGroup(string $group, array $data) Add group attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _attrGroup(string $group, array $data) Apply to parent. Add group attribute
     * @method self|static|\Lar\Layout\Abstracts\Component openMode()
     * @method self|static|\Lar\Layout\Abstracts\Component _openMode() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component|\Lar\LJS\LJS setJs() JS Core setter
     * @method self|static|\Lar\Layout\Abstracts\Component|\Lar\LJS\LJS _setJs() Apply to parent. JS Core setter
     * @method self|static|\Lar\Layout\Abstracts\Component hide($eq = true) Hide component
     * @method self|static|\Lar\Layout\Abstracts\Component _hide($eq = true) Apply to parent. Hide component
     * @method self|static|\Lar\Layout\Abstracts\Component setUID() Set unique default tag attribute ID
     * @method self|static|\Lar\Layout\Abstracts\Component _setUID() Apply to parent. Set unique default tag attribute ID
     * @method self|static|\Lar\Layout\Abstracts\Component name(string $name) Name setter
     * @method self|static|\Lar\Layout\Abstracts\Component _name(string $name) Apply to parent. Name setter
     * @method self|static|\Lar\Layout\Abstracts\Component setDebug() Debug mode setter
     * @method self|static|\Lar\Layout\Abstracts\Component _setDebug() Apply to parent. Debug mode setter
     * @method self|static|\Lar\Layout\Abstracts\Component setParent(\Lar\Tagable\Tag $tag) Parent setter
     * @method self|static|\Lar\Layout\Abstracts\Component _setParent(\Lar\Tagable\Tag $tag) Apply to parent. Parent setter
     * @method self|static|\Lar\Layout\Abstracts\Component setDatas(array $datas) Set the values of the attribute "data-*"
     * @method self|static|\Lar\Layout\Abstracts\Component _setDatas(array $datas) Apply to parent. Set the values of the attribute "data-*"
     * @method self|static|\Lar\Layout\Abstracts\Component setRules(array $rules)
     * @method self|static|\Lar\Layout\Abstracts\Component _setRules(array $rules) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component attr($name, $value = null) Attribute setter
     * @method self|static|\Lar\Layout\Abstracts\Component _attr($name, $value = null) Apply to parent. Attribute setter
     * @method self|static|\Lar\Layout\Abstracts\Component|mixed text($value, ...$values) Content setter
     * @method self|static|\Lar\Layout\Abstracts\Component|mixed _text($value, ...$values) Apply to parent. Content setter
     * @method self|static|\Lar\Layout\Abstracts\Component addClass(...$class) Add class in to tag
     * @method self|static|\Lar\Layout\Abstracts\Component _addClass(...$class) Apply to parent. Add class in to tag
     * @method self|static|\Lar\Layout\Abstracts\Component addClassIf($eq, ...$class) Add class in to tag if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _addClassIf($eq, ...$class) Apply to parent. Add class in to tag if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component appEndIf($eq, ...$data)
     * @method self|static|\Lar\Layout\Abstracts\Component _appEndIf($eq, ...$data) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component appEnd(...$data) Content append setter
     * @method self|static|\Lar\Layout\Abstracts\Component _appEnd(...$data) Apply to parent. Content append setter
     * @method self|static|\Lar\Layout\Abstracts\Component prepEndIf($eq, ...$data)
     * @method self|static|\Lar\Layout\Abstracts\Component _prepEndIf($eq, ...$data) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prepEnd(...$data) Content prepend setter
     * @method self|static|\Lar\Layout\Abstracts\Component _prepEnd(...$data) Apply to parent. Content prepend setter
     * @method self|static|\Lar\Layout\Abstracts\Component content(...$value)
     * @method self|static|\Lar\Layout\Abstracts\Component _content(...$value) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component anchor(string $name = "") Set anchor
     * @method self|static|\Lar\Layout\Abstracts\Component _anchor(string $name = "") Apply to parent. Set anchor
     * @method self|static|\Lar\Layout\Abstracts\Component setExternalLink(string $class, array $params = [], string $position = null) Set External Link
     * @method self|static|\Lar\Layout\Abstracts\Component _setExternalLink(string $class, array $params = [], string $position = null) Apply to parent. Set External Link
     * @method self|static|\Lar\Layout\Abstracts\Component|\Lar\Layout\Respond|Respond lj($event = "begin") LJS Worker
     * @method self|static|\Lar\Layout\Abstracts\Component|\Lar\Layout\Respond|Respond _lj($event = "begin") Apply to parent. LJS Worker
     * @method self|static|\Lar\Layout\Abstracts\Component setHandlerName(string $handler_name) Set Handler name
     * @method self|static|\Lar\Layout\Abstracts\Component _setHandlerName(string $handler_name) Apply to parent. Set Handler name
     * @method self|static|\Lar\Layout\Abstracts\Component|\Lar\Layout\Respond|Respond| ljs($exec = null, $params = null, $event = "click") Add ljs executor
     * @method self|static|\Lar\Layout\Abstracts\Component|\Lar\Layout\Respond|Respond| _ljs($exec = null, $params = null, $event = "click") Apply to parent. Add ljs executor
     * @method self|static|\Lar\Layout\Abstracts\Component add(string $element, array $arguments = []) Add new child
     * @method self|static|\Lar\Layout\Abstracts\Component _add(string $element, array $arguments = []) Apply to parent. Add new child
     * @method self|static|\Lar\Layout\Abstracts\Component repeat(int $time)
     * @method self|static|\Lar\Layout\Abstracts\Component _repeat(int $time) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component when(...$arguments) When element
     * @method self|static|\Lar\Layout\Abstracts\Component _when(...$arguments) Apply to parent. When element
     * @method self|static|\Lar\Layout\Abstracts\Component whenIf($eq, ...$data) Make when if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component _whenIf($eq, ...$data) Apply to parent. Make when if $eq == true
     * @method self|static|\Lar\Layout\Abstracts\Component createUniqueAttribute() Create unique attribute from tag
     * @method self|static|\Lar\Layout\Abstracts\Component _createUniqueAttribute() Apply to parent. Create unique attribute from tag
     * @method self|static|\Lar\Layout\Abstracts\Component createUnique(string $prefix = "tag") Create unique inner identifier from tag
     * @method self|static|\Lar\Layout\Abstracts\Component _createUnique(string $prefix = "tag") Apply to parent. Create unique inner identifier from tag
     * @method self|static|\Lar\Layout\Abstracts\Component whenRender($call) Set when render closure
     * @method self|static|\Lar\Layout\Abstracts\Component _whenRender($call) Apply to parent. Set when render closure
     * @method self|static|\Lar\Layout\Abstracts\Component nameAppEnd(string $name_append) Add name in app end
     * @method self|static|\Lar\Layout\Abstracts\Component _nameAppEnd(string $name_append) Apply to parent. Add name in app end
     * @method self|static|\Lar\Layout\Abstracts\Component namePrepEnd(string $name_prepend) Add name prepend
     * @method self|static|\Lar\Layout\Abstracts\Component _namePrepEnd(string $name_prepend) Apply to parent. Add name prepend
     * @method self|static|\Lar\Layout\Abstracts\Component offBottom() Disable bottom content mode
     * @method self|static|\Lar\Layout\Abstracts\Component _offBottom() Apply to parent. Disable bottom content mode
     * @method self|static|\Lar\Layout\Abstracts\Component toBottom(...$data) Type to bottom mode
     * @method self|static|\Lar\Layout\Abstracts\Component _toBottom(...$data) Apply to parent. Type to bottom mode
     * @method self|static|\Lar\Layout\Abstracts\Component l($key, array $params = [], $provider = "text") Insert lang key
     * @method self|static|\Lar\Layout\Abstracts\Component _l($key, array $params = [], $provider = "text") Apply to parent. Insert lang key
     * @method self|static|\Lar\Layout\Abstracts\Component toExecute(...$data) Add method or methods to execute list
     * @method self|static|\Lar\Layout\Abstracts\Component _toExecute(...$data) Apply to parent. Add method or methods to execute list
     * @method self|static|\Lar\Layout\Abstracts\Component toConstruct(...$data) Add method or methods to constructor list
     * @method self|static|\Lar\Layout\Abstracts\Component _toConstruct(...$data) Apply to parent. Add method or methods to constructor list
     * @method self|static|\Lar\Layout\Abstracts\Component toGlobalExecute($data) Add method or methods to global execute list
     * @method self|static|\Lar\Layout\Abstracts\Component _toGlobalExecute($data) Apply to parent. Add method or methods to global execute list
     * @method self|static|\Lar\Layout\Abstracts\Component quickInfusion(array $data) Quick infusion tag width data
     * @method self|static|\Lar\Layout\Abstracts\Component _quickInfusion(array $data) Apply to parent. Quick infusion tag width data
     * @method self|static|\Lar\Layout\Abstracts\Component prefixName($prefix = null) Create name prefix
     * @method self|static|\Lar\Layout\Abstracts\Component _prefixName($prefix = null) Apply to parent. Create name prefix
     * @method self|static|\Lar\Layout\Abstracts\Component initialScript($script, $params = null) Initial tag script
     * @method self|static|\Lar\Layout\Abstracts\Component _initialScript($script, $params = null) Apply to parent. Initial tag script
     * @method self|static|\Lar\Layout\Abstracts\Component view($path, $data = [], $mergeData = []) Insert blade in tag
     * @method self|static|\Lar\Layout\Abstracts\Component _view($path, $data = [], $mergeData = []) Apply to parent. Insert blade in tag
     * @method self|static|\Lar\Layout\Abstracts\Component setChildElementCount(int $child_element_count) Child element count setter
     * @method self|static|\Lar\Layout\Abstracts\Component _setChildElementCount(int $child_element_count) Apply to parent. Child element count setter
     * @method self|static|\Lar\Layout\Abstracts\Component wrapTo(string $tag, array $contents = [], array $attributes = []) Wrap data
     * @method self|static|\Lar\Layout\Abstracts\Component _wrapTo(string $tag, array $contents = [], array $attributes = []) Apply to parent. Wrap data
     * @method self|static|\Lar\Layout\Abstracts\Component do($object, string $method = null, array $params = []) Say to do that
     * @method self|static|\Lar\Layout\Abstracts\Component _do($object, string $method = null, array $params = []) Apply to parent. Say to do that
     * @method self|static|\Lar\Layout\Abstracts\Component next(...$methods) Apply parent methods in the component
     * @method self|static|\Lar\Layout\Abstracts\Component _next(...$methods) Apply to parent. Apply parent methods in the component
     * @method self|static|\Lar\Layout\Abstracts\Component nextIf($eq, ...$methods) Apply parent methods in the component if $eq equal a true
     * @method self|static|\Lar\Layout\Abstracts\Component _nextIf($eq, ...$methods) Apply to parent. Apply parent methods in the component if $eq equal a true
     * @method self|static|\Lar\Layout\Abstracts\Component callIf($eq, string $method, ...$params)
     * @method self|static|\Lar\Layout\Abstracts\Component _callIf($eq, string $method, ...$params) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component call(string $method, ...$params)
     * @method self|static|\Lar\Layout\Abstracts\Component _call(string $method, ...$params) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component haveLink($link)
     * @method self|static|\Lar\Layout\Abstracts\Component _haveLink($link) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component generateExternalLink(array $params = [], $rewrite = true) Generate external link on component
     * @method self|static|\Lar\Layout\Abstracts\Component _generateExternalLink(array $params = [], $rewrite = true) Apply to parent. Generate external link on component
     * @method self|static|\Lar\Layout\Abstracts\Component ignore($eq = 1) Ignore this component if variable $eq equal a boolean true
     * @method self|static|\Lar\Layout\Abstracts\Component _ignore($eq = 1) Apply to parent. Ignore this component if variable $eq equal a boolean true
     * @method self|static|\Lar\Layout\Abstracts\Component ignoreContent($eq = 1) Ignore content of this component if variable $eq equal a boolean true
     * @method self|static|\Lar\Layout\Abstracts\Component _ignoreContent($eq = 1) Apply to parent. Ignore content of this component if variable $eq equal a boolean true
     * @method self|static|\Lar\Layout\Abstracts\Component ignoreWrapper($eq = 1) Ignore tag wrapper of this component if variable $eq equal a boolean true
     * @method self|static|\Lar\Layout\Abstracts\Component _ignoreWrapper($eq = 1) Apply to parent. Ignore tag wrapper of this component if variable $eq equal a boolean true
     * @method self|static|\Lar\Layout\Abstracts\Component unRender()
     * @method self|static|\Lar\Layout\Abstracts\Component _unRender() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component unHash($hash_name = "RENDERED") Remove hash by name
     * @method self|static|\Lar\Layout\Abstracts\Component _unHash($hash_name = "RENDERED") Apply to parent. Remove hash by name
     * @method self|static|\Lar\Layout\Abstracts\Component removeAttribute($name) Remove attribute
     * @method self|static|\Lar\Layout\Abstracts\Component _removeAttribute($name) Apply to parent. Remove attribute
     * @method self|static|\Lar\Layout\Abstracts\Component resetAttributes() Reset all attributes
     * @method self|static|\Lar\Layout\Abstracts\Component _resetAttributes() Apply to parent. Reset all attributes
     * @method self|static|\Lar\Layout\Abstracts\Component clear() Clean component
     * @method self|static|\Lar\Layout\Abstracts\Component _clear() Apply to parent. Clean component
     * @method self|static|\Lar\Layout\Abstracts\Component dump() Dump this tag
     * @method self|static|\Lar\Layout\Abstracts\Component _dump() Apply to parent. Dump this tag
     * @method self|static|\Lar\Layout\Abstracts\Component only_content()
     * @method self|static|\Lar\Layout\Abstracts\Component _only_content() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component rendered($call) Event after render
     * @method self|static|\Lar\Layout\Abstracts\Component _rendered($call) Apply to parent. Event after render
     * @method self|static|\Lar\Layout\Abstracts\Component merge_rendered(array $call) Events after render
     * @method self|static|\Lar\Layout\Abstracts\Component _merge_rendered(array $call) Apply to parent. Events after render
     * @method self|static|\Lar\Layout\Abstracts\Component slot($component) Insert extended data
     * @method self|static|\Lar\Layout\Abstracts\Component _slot($component) Apply to parent. Insert extended data
     * @method self|static|\Lar\Layout\Abstracts\Component|string render()
     * @method self|static|\Lar\Layout\Abstracts\Component|string _render() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component appEndToRendered($data)
     * @method self|static|\Lar\Layout\Abstracts\Component _appEndToRendered($data) Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component shadowSm()
     * @method self|static|\Lar\Layout\Abstracts\Component _shadowSm() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component shadow()
     * @method self|static|\Lar\Layout\Abstracts\Component _shadow() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component shadowLg()
     * @method self|static|\Lar\Layout\Abstracts\Component _shadowLg() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component shadowNone()
     * @method self|static|\Lar\Layout\Abstracts\Component _shadowNone() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component w25()
     * @method self|static|\Lar\Layout\Abstracts\Component _w25() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component w50()
     * @method self|static|\Lar\Layout\Abstracts\Component _w50() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component w75()
     * @method self|static|\Lar\Layout\Abstracts\Component _w75() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component w100()
     * @method self|static|\Lar\Layout\Abstracts\Component _w100() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component wAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _wAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component h25()
     * @method self|static|\Lar\Layout\Abstracts\Component _h25() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component h50()
     * @method self|static|\Lar\Layout\Abstracts\Component _h50() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component h75()
     * @method self|static|\Lar\Layout\Abstracts\Component _h75() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component h100()
     * @method self|static|\Lar\Layout\Abstracts\Component _h100() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component hAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _hAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mw100()
     * @method self|static|\Lar\Layout\Abstracts\Component _mw100() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mh100()
     * @method self|static|\Lar\Layout\Abstracts\Component _mh100() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component minVw100()
     * @method self|static|\Lar\Layout\Abstracts\Component _minVw100() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component minVh100()
     * @method self|static|\Lar\Layout\Abstracts\Component _minVh100() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component vw100()
     * @method self|static|\Lar\Layout\Abstracts\Component _vw100() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component vh100()
     * @method self|static|\Lar\Layout\Abstracts\Component _vh100() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component stretchedLink()
     * @method self|static|\Lar\Layout\Abstracts\Component _stretchedLink() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component m0()
     * @method self|static|\Lar\Layout\Abstracts\Component _m0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mt0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mt0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component my0()
     * @method self|static|\Lar\Layout\Abstracts\Component _my0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mr0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mr0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mx0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mx0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mb0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mb0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ml0()
     * @method self|static|\Lar\Layout\Abstracts\Component _ml0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component m1()
     * @method self|static|\Lar\Layout\Abstracts\Component _m1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mt1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mt1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component my1()
     * @method self|static|\Lar\Layout\Abstracts\Component _my1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mr1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mr1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mx1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mx1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mb1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mb1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ml1()
     * @method self|static|\Lar\Layout\Abstracts\Component _ml1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component m2()
     * @method self|static|\Lar\Layout\Abstracts\Component _m2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mt2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mt2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component my2()
     * @method self|static|\Lar\Layout\Abstracts\Component _my2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mr2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mr2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mx2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mx2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mb2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mb2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ml2()
     * @method self|static|\Lar\Layout\Abstracts\Component _ml2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component m3()
     * @method self|static|\Lar\Layout\Abstracts\Component _m3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mt3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mt3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component my3()
     * @method self|static|\Lar\Layout\Abstracts\Component _my3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mr3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mr3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mx3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mx3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mb3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mb3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ml3()
     * @method self|static|\Lar\Layout\Abstracts\Component _ml3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component m4()
     * @method self|static|\Lar\Layout\Abstracts\Component _m4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mt4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mt4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component my4()
     * @method self|static|\Lar\Layout\Abstracts\Component _my4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mr4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mr4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mx4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mx4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mb4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mb4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ml4()
     * @method self|static|\Lar\Layout\Abstracts\Component _ml4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component m5()
     * @method self|static|\Lar\Layout\Abstracts\Component _m5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mt5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mt5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component my5()
     * @method self|static|\Lar\Layout\Abstracts\Component _my5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mr5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mr5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mx5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mx5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mb5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mb5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ml5()
     * @method self|static|\Lar\Layout\Abstracts\Component _ml5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component p0()
     * @method self|static|\Lar\Layout\Abstracts\Component _p0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pt0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pt0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component py0()
     * @method self|static|\Lar\Layout\Abstracts\Component _py0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pr0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pr0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component px0()
     * @method self|static|\Lar\Layout\Abstracts\Component _px0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pb0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pb0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component p1()
     * @method self|static|\Lar\Layout\Abstracts\Component _p1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pt1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pt1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component py1()
     * @method self|static|\Lar\Layout\Abstracts\Component _py1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pr1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pr1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component px1()
     * @method self|static|\Lar\Layout\Abstracts\Component _px1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pb1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pb1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component p2()
     * @method self|static|\Lar\Layout\Abstracts\Component _p2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pt2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pt2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component py2()
     * @method self|static|\Lar\Layout\Abstracts\Component _py2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pr2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pr2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component px2()
     * @method self|static|\Lar\Layout\Abstracts\Component _px2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pb2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pb2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component p3()
     * @method self|static|\Lar\Layout\Abstracts\Component _p3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pt3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pt3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component py3()
     * @method self|static|\Lar\Layout\Abstracts\Component _py3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pr3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pr3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component px3()
     * @method self|static|\Lar\Layout\Abstracts\Component _px3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pb3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pb3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component p4()
     * @method self|static|\Lar\Layout\Abstracts\Component _p4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pt4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pt4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component py4()
     * @method self|static|\Lar\Layout\Abstracts\Component _py4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pr4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pr4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component px4()
     * @method self|static|\Lar\Layout\Abstracts\Component _px4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pb4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pb4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component p5()
     * @method self|static|\Lar\Layout\Abstracts\Component _p5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pt5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pt5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component py5()
     * @method self|static|\Lar\Layout\Abstracts\Component _py5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pr5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pr5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component px5()
     * @method self|static|\Lar\Layout\Abstracts\Component _px5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pb5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pb5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _myN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _myN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _myN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _myN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _myN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _myAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mSm0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mSm0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtSm0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtSm0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mySm0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mySm0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrSm0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrSm0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxSm0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxSm0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbSm0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbSm0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlSm0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlSm0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mSm1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mSm1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtSm1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtSm1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mySm1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mySm1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrSm1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrSm1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxSm1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxSm1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbSm1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbSm1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlSm1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlSm1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mSm2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mSm2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtSm2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtSm2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mySm2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mySm2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrSm2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrSm2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxSm2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxSm2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbSm2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbSm2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlSm2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlSm2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mSm3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mSm3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtSm3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtSm3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mySm3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mySm3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrSm3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrSm3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxSm3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxSm3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbSm3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbSm3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlSm3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlSm3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mSm4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mSm4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtSm4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtSm4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mySm4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mySm4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrSm4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrSm4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxSm4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxSm4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbSm4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbSm4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlSm4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlSm4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mSm5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mSm5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtSm5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtSm5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mySm5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mySm5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrSm5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrSm5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxSm5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxSm5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbSm5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbSm5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlSm5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlSm5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pSm0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pSm0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptSm0()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptSm0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pySm0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pySm0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prSm0()
     * @method self|static|\Lar\Layout\Abstracts\Component _prSm0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxSm0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxSm0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbSm0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbSm0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plSm0()
     * @method self|static|\Lar\Layout\Abstracts\Component _plSm0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pSm1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pSm1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptSm1()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptSm1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pySm1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pySm1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prSm1()
     * @method self|static|\Lar\Layout\Abstracts\Component _prSm1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxSm1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxSm1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbSm1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbSm1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plSm1()
     * @method self|static|\Lar\Layout\Abstracts\Component _plSm1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pSm2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pSm2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptSm2()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptSm2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pySm2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pySm2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prSm2()
     * @method self|static|\Lar\Layout\Abstracts\Component _prSm2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxSm2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxSm2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbSm2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbSm2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plSm2()
     * @method self|static|\Lar\Layout\Abstracts\Component _plSm2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pSm3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pSm3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptSm3()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptSm3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pySm3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pySm3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prSm3()
     * @method self|static|\Lar\Layout\Abstracts\Component _prSm3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxSm3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxSm3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbSm3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbSm3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plSm3()
     * @method self|static|\Lar\Layout\Abstracts\Component _plSm3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pSm4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pSm4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptSm4()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptSm4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pySm4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pySm4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prSm4()
     * @method self|static|\Lar\Layout\Abstracts\Component _prSm4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxSm4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxSm4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbSm4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbSm4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plSm4()
     * @method self|static|\Lar\Layout\Abstracts\Component _plSm4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pSm5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pSm5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptSm5()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptSm5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pySm5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pySm5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prSm5()
     * @method self|static|\Lar\Layout\Abstracts\Component _prSm5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxSm5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxSm5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbSm5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbSm5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plSm5()
     * @method self|static|\Lar\Layout\Abstracts\Component _plSm5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mSmN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mSmN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtSmN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtSmN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mySmN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mySmN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrSmN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrSmN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxSmN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxSmN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbSmN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbSmN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlSmN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlSmN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mSmN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mSmN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtSmN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtSmN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mySmN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mySmN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrSmN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrSmN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxSmN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxSmN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbSmN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbSmN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlSmN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlSmN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mSmN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mSmN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtSmN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtSmN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mySmN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mySmN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrSmN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrSmN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxSmN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxSmN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbSmN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbSmN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlSmN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlSmN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mSmN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mSmN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtSmN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtSmN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mySmN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mySmN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrSmN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrSmN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxSmN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxSmN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbSmN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbSmN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlSmN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlSmN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mSmN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mSmN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtSmN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtSmN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mySmN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mySmN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrSmN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrSmN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxSmN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxSmN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbSmN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbSmN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlSmN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlSmN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mSmAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mSmAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtSmAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtSmAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mySmAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mySmAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrSmAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrSmAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxSmAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxSmAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbSmAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbSmAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlSmAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlSmAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mMd0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mMd0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtMd0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtMd0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myMd0()
     * @method self|static|\Lar\Layout\Abstracts\Component _myMd0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrMd0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrMd0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxMd0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxMd0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbMd0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbMd0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlMd0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlMd0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mMd1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mMd1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtMd1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtMd1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myMd1()
     * @method self|static|\Lar\Layout\Abstracts\Component _myMd1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrMd1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrMd1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxMd1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxMd1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbMd1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbMd1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlMd1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlMd1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mMd2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mMd2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtMd2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtMd2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myMd2()
     * @method self|static|\Lar\Layout\Abstracts\Component _myMd2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrMd2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrMd2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxMd2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxMd2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbMd2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbMd2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlMd2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlMd2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mMd3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mMd3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtMd3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtMd3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myMd3()
     * @method self|static|\Lar\Layout\Abstracts\Component _myMd3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrMd3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrMd3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxMd3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxMd3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbMd3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbMd3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlMd3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlMd3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mMd4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mMd4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtMd4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtMd4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myMd4()
     * @method self|static|\Lar\Layout\Abstracts\Component _myMd4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrMd4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrMd4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxMd4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxMd4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbMd4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbMd4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlMd4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlMd4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mMd5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mMd5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtMd5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtMd5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myMd5()
     * @method self|static|\Lar\Layout\Abstracts\Component _myMd5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrMd5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrMd5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxMd5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxMd5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbMd5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbMd5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlMd5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlMd5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pMd0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pMd0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptMd0()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptMd0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyMd0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyMd0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prMd0()
     * @method self|static|\Lar\Layout\Abstracts\Component _prMd0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxMd0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxMd0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbMd0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbMd0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plMd0()
     * @method self|static|\Lar\Layout\Abstracts\Component _plMd0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pMd1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pMd1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptMd1()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptMd1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyMd1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyMd1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prMd1()
     * @method self|static|\Lar\Layout\Abstracts\Component _prMd1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxMd1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxMd1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbMd1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbMd1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plMd1()
     * @method self|static|\Lar\Layout\Abstracts\Component _plMd1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pMd2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pMd2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptMd2()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptMd2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyMd2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyMd2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prMd2()
     * @method self|static|\Lar\Layout\Abstracts\Component _prMd2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxMd2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxMd2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbMd2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbMd2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plMd2()
     * @method self|static|\Lar\Layout\Abstracts\Component _plMd2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pMd3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pMd3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptMd3()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptMd3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyMd3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyMd3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prMd3()
     * @method self|static|\Lar\Layout\Abstracts\Component _prMd3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxMd3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxMd3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbMd3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbMd3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plMd3()
     * @method self|static|\Lar\Layout\Abstracts\Component _plMd3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pMd4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pMd4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptMd4()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptMd4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyMd4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyMd4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prMd4()
     * @method self|static|\Lar\Layout\Abstracts\Component _prMd4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxMd4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxMd4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbMd4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbMd4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plMd4()
     * @method self|static|\Lar\Layout\Abstracts\Component _plMd4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pMd5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pMd5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptMd5()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptMd5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyMd5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyMd5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prMd5()
     * @method self|static|\Lar\Layout\Abstracts\Component _prMd5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxMd5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxMd5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbMd5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbMd5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plMd5()
     * @method self|static|\Lar\Layout\Abstracts\Component _plMd5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mMdN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mMdN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtMdN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtMdN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myMdN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _myMdN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrMdN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrMdN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxMdN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxMdN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbMdN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbMdN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlMdN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlMdN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mMdN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mMdN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtMdN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtMdN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myMdN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _myMdN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrMdN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrMdN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxMdN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxMdN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbMdN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbMdN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlMdN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlMdN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mMdN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mMdN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtMdN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtMdN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myMdN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _myMdN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrMdN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrMdN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxMdN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxMdN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbMdN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbMdN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlMdN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlMdN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mMdN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mMdN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtMdN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtMdN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myMdN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _myMdN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrMdN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrMdN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxMdN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxMdN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbMdN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbMdN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlMdN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlMdN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mMdN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mMdN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtMdN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtMdN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myMdN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _myMdN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrMdN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrMdN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxMdN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxMdN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbMdN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbMdN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlMdN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlMdN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mMdAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mMdAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtMdAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtMdAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myMdAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _myMdAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrMdAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrMdAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxMdAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxMdAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbMdAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbMdAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlMdAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlMdAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mLg0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mLg0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtLg0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtLg0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myLg0()
     * @method self|static|\Lar\Layout\Abstracts\Component _myLg0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrLg0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrLg0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxLg0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxLg0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbLg0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbLg0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlLg0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlLg0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mLg1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mLg1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtLg1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtLg1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myLg1()
     * @method self|static|\Lar\Layout\Abstracts\Component _myLg1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrLg1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrLg1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxLg1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxLg1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbLg1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbLg1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlLg1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlLg1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mLg2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mLg2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtLg2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtLg2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myLg2()
     * @method self|static|\Lar\Layout\Abstracts\Component _myLg2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrLg2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrLg2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxLg2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxLg2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbLg2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbLg2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlLg2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlLg2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mLg3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mLg3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtLg3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtLg3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myLg3()
     * @method self|static|\Lar\Layout\Abstracts\Component _myLg3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrLg3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrLg3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxLg3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxLg3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbLg3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbLg3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlLg3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlLg3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mLg4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mLg4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtLg4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtLg4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myLg4()
     * @method self|static|\Lar\Layout\Abstracts\Component _myLg4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrLg4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrLg4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxLg4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxLg4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbLg4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbLg4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlLg4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlLg4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mLg5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mLg5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtLg5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtLg5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myLg5()
     * @method self|static|\Lar\Layout\Abstracts\Component _myLg5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrLg5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrLg5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxLg5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxLg5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbLg5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbLg5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlLg5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlLg5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pLg0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pLg0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptLg0()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptLg0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyLg0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyLg0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prLg0()
     * @method self|static|\Lar\Layout\Abstracts\Component _prLg0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxLg0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxLg0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbLg0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbLg0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plLg0()
     * @method self|static|\Lar\Layout\Abstracts\Component _plLg0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pLg1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pLg1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptLg1()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptLg1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyLg1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyLg1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prLg1()
     * @method self|static|\Lar\Layout\Abstracts\Component _prLg1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxLg1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxLg1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbLg1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbLg1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plLg1()
     * @method self|static|\Lar\Layout\Abstracts\Component _plLg1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pLg2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pLg2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptLg2()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptLg2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyLg2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyLg2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prLg2()
     * @method self|static|\Lar\Layout\Abstracts\Component _prLg2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxLg2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxLg2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbLg2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbLg2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plLg2()
     * @method self|static|\Lar\Layout\Abstracts\Component _plLg2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pLg3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pLg3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptLg3()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptLg3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyLg3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyLg3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prLg3()
     * @method self|static|\Lar\Layout\Abstracts\Component _prLg3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxLg3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxLg3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbLg3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbLg3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plLg3()
     * @method self|static|\Lar\Layout\Abstracts\Component _plLg3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pLg4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pLg4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptLg4()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptLg4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyLg4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyLg4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prLg4()
     * @method self|static|\Lar\Layout\Abstracts\Component _prLg4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxLg4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxLg4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbLg4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbLg4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plLg4()
     * @method self|static|\Lar\Layout\Abstracts\Component _plLg4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pLg5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pLg5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptLg5()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptLg5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyLg5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyLg5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prLg5()
     * @method self|static|\Lar\Layout\Abstracts\Component _prLg5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxLg5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxLg5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbLg5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbLg5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plLg5()
     * @method self|static|\Lar\Layout\Abstracts\Component _plLg5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mLgN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mLgN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtLgN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtLgN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myLgN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _myLgN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrLgN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrLgN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxLgN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxLgN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbLgN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbLgN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlLgN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlLgN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mLgN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mLgN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtLgN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtLgN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myLgN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _myLgN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrLgN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrLgN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxLgN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxLgN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbLgN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbLgN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlLgN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlLgN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mLgN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mLgN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtLgN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtLgN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myLgN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _myLgN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrLgN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrLgN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxLgN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxLgN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbLgN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbLgN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlLgN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlLgN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mLgN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mLgN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtLgN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtLgN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myLgN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _myLgN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrLgN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrLgN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxLgN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxLgN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbLgN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbLgN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlLgN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlLgN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mLgN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mLgN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtLgN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtLgN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myLgN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _myLgN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrLgN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrLgN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxLgN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxLgN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbLgN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbLgN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlLgN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlLgN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mLgAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mLgAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtLgAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtLgAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myLgAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _myLgAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrLgAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrLgAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxLgAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxLgAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbLgAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbLgAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlLgAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlLgAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mXl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mXl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtXl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtXl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myXl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _myXl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrXl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrXl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxXl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxXl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbXl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbXl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlXl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlXl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mXl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mXl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtXl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtXl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myXl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _myXl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrXl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrXl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxXl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxXl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbXl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbXl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlXl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlXl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mXl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mXl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtXl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtXl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myXl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _myXl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrXl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrXl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxXl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxXl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbXl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbXl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlXl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlXl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mXl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mXl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtXl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtXl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myXl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _myXl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrXl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrXl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxXl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxXl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbXl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbXl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlXl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlXl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mXl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mXl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtXl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtXl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myXl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _myXl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrXl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrXl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxXl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxXl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbXl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbXl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlXl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlXl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mXl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mXl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtXl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtXl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myXl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _myXl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrXl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrXl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxXl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxXl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbXl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbXl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlXl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlXl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pXl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pXl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptXl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptXl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyXl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyXl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prXl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _prXl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxXl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxXl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbXl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbXl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plXl0()
     * @method self|static|\Lar\Layout\Abstracts\Component _plXl0() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pXl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pXl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptXl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptXl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyXl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyXl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prXl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _prXl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxXl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxXl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbXl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbXl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plXl1()
     * @method self|static|\Lar\Layout\Abstracts\Component _plXl1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pXl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pXl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptXl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptXl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyXl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyXl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prXl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _prXl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxXl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxXl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbXl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbXl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plXl2()
     * @method self|static|\Lar\Layout\Abstracts\Component _plXl2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pXl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pXl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptXl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptXl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyXl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyXl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prXl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _prXl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxXl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxXl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbXl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbXl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plXl3()
     * @method self|static|\Lar\Layout\Abstracts\Component _plXl3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pXl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pXl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptXl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptXl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyXl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyXl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prXl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _prXl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxXl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxXl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbXl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbXl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plXl4()
     * @method self|static|\Lar\Layout\Abstracts\Component _plXl4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pXl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pXl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component ptXl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _ptXl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pyXl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pyXl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component prXl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _prXl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pxXl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pxXl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component pbXl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _pbXl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component plXl5()
     * @method self|static|\Lar\Layout\Abstracts\Component _plXl5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mXlN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mXlN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtXlN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtXlN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myXlN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _myXlN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrXlN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrXlN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxXlN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxXlN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbXlN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbXlN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlXlN1()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlXlN1() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mXlN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mXlN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtXlN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtXlN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myXlN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _myXlN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrXlN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrXlN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxXlN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxXlN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbXlN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbXlN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlXlN2()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlXlN2() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mXlN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mXlN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtXlN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtXlN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myXlN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _myXlN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrXlN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrXlN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxXlN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxXlN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbXlN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbXlN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlXlN3()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlXlN3() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mXlN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mXlN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtXlN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtXlN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myXlN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _myXlN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrXlN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrXlN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxXlN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxXlN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbXlN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbXlN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlXlN4()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlXlN4() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mXlN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mXlN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtXlN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtXlN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myXlN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _myXlN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrXlN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrXlN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxXlN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxXlN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbXlN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbXlN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlXlN5()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlXlN5() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mXlAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mXlAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mtXlAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mtXlAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component myXlAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _myXlAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mrXlAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mrXlAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mxXlAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mxXlAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mbXlAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mbXlAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component mlXlAuto()
     * @method self|static|\Lar\Layout\Abstracts\Component _mlXlAuto() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textMonospace()
     * @method self|static|\Lar\Layout\Abstracts\Component _textMonospace() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textJustify()
     * @method self|static|\Lar\Layout\Abstracts\Component _textJustify() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textWrap()
     * @method self|static|\Lar\Layout\Abstracts\Component _textWrap() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textNowrap()
     * @method self|static|\Lar\Layout\Abstracts\Component _textNowrap() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textTruncate()
     * @method self|static|\Lar\Layout\Abstracts\Component _textTruncate() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textLeft()
     * @method self|static|\Lar\Layout\Abstracts\Component _textLeft() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textRight()
     * @method self|static|\Lar\Layout\Abstracts\Component _textRight() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textCenter()
     * @method self|static|\Lar\Layout\Abstracts\Component _textCenter() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textSmLeft()
     * @method self|static|\Lar\Layout\Abstracts\Component _textSmLeft() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textSmRight()
     * @method self|static|\Lar\Layout\Abstracts\Component _textSmRight() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textSmCenter()
     * @method self|static|\Lar\Layout\Abstracts\Component _textSmCenter() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textMdLeft()
     * @method self|static|\Lar\Layout\Abstracts\Component _textMdLeft() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textMdRight()
     * @method self|static|\Lar\Layout\Abstracts\Component _textMdRight() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textMdCenter()
     * @method self|static|\Lar\Layout\Abstracts\Component _textMdCenter() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textLgLeft()
     * @method self|static|\Lar\Layout\Abstracts\Component _textLgLeft() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textLgRight()
     * @method self|static|\Lar\Layout\Abstracts\Component _textLgRight() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textLgCenter()
     * @method self|static|\Lar\Layout\Abstracts\Component _textLgCenter() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textXlLeft()
     * @method self|static|\Lar\Layout\Abstracts\Component _textXlLeft() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textXlRight()
     * @method self|static|\Lar\Layout\Abstracts\Component _textXlRight() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textXlCenter()
     * @method self|static|\Lar\Layout\Abstracts\Component _textXlCenter() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textLowercase()
     * @method self|static|\Lar\Layout\Abstracts\Component _textLowercase() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textUppercase()
     * @method self|static|\Lar\Layout\Abstracts\Component _textUppercase() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textCapitalize()
     * @method self|static|\Lar\Layout\Abstracts\Component _textCapitalize() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component fontWeightLight()
     * @method self|static|\Lar\Layout\Abstracts\Component _fontWeightLight() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component fontWeightLighter()
     * @method self|static|\Lar\Layout\Abstracts\Component _fontWeightLighter() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component fontWeightNormal()
     * @method self|static|\Lar\Layout\Abstracts\Component _fontWeightNormal() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component fontWeightBold()
     * @method self|static|\Lar\Layout\Abstracts\Component _fontWeightBold() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component fontWeightBolder()
     * @method self|static|\Lar\Layout\Abstracts\Component _fontWeightBolder() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component fontItalic()
     * @method self|static|\Lar\Layout\Abstracts\Component _fontItalic() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textWhite()
     * @method self|static|\Lar\Layout\Abstracts\Component _textWhite() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textPrimary()
     * @method self|static|\Lar\Layout\Abstracts\Component _textPrimary() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textSecondary()
     * @method self|static|\Lar\Layout\Abstracts\Component _textSecondary() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textSuccess()
     * @method self|static|\Lar\Layout\Abstracts\Component _textSuccess() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textInfo()
     * @method self|static|\Lar\Layout\Abstracts\Component _textInfo() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textWarning()
     * @method self|static|\Lar\Layout\Abstracts\Component _textWarning() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textDanger()
     * @method self|static|\Lar\Layout\Abstracts\Component _textDanger() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textLight()
     * @method self|static|\Lar\Layout\Abstracts\Component _textLight() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textDark()
     * @method self|static|\Lar\Layout\Abstracts\Component _textDark() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textBody()
     * @method self|static|\Lar\Layout\Abstracts\Component _textBody() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textMuted()
     * @method self|static|\Lar\Layout\Abstracts\Component _textMuted() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textBlack50()
     * @method self|static|\Lar\Layout\Abstracts\Component _textBlack50() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textWhite50()
     * @method self|static|\Lar\Layout\Abstracts\Component _textWhite50() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textHide()
     * @method self|static|\Lar\Layout\Abstracts\Component _textHide() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textDecorationNone()
     * @method self|static|\Lar\Layout\Abstracts\Component _textDecorationNone() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textBreak()
     * @method self|static|\Lar\Layout\Abstracts\Component _textBreak() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component textReset()
     * @method self|static|\Lar\Layout\Abstracts\Component _textReset() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component visible()
     * @method self|static|\Lar\Layout\Abstracts\Component _visible() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component invisible()
     * @method self|static|\Lar\Layout\Abstracts\Component _invisible() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component imgFluid()
     * @method self|static|\Lar\Layout\Abstracts\Component _imgFluid() Apply to parent. 
     * @method self|static|\Lar\Layout\Abstracts\Component imgCircle()
     * @method self|static|\Lar\Layout\Abstracts\Component _imgCircle() Apply to parent. 
     */
    class LarDoc extends \Lar\Tagable\Tag
    {
    }


}
