<?php
/**
* WoltLab Community Framework
* Template: boardList
* Compiled at: Tue, 13 Aug 2013 11:12:04 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'boardList';
?>
<?php
$outerTemplateNameca63672edd2a31442176113da3bc747bc3a6b94e = $this->v['tpl']['template'];
$this->includeTemplate('header', array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateNameca63672edd2a31442176113da3bc747bc3a6b94e;
$this->v['tpl']['includedTemplates']['header'] = 1;
?>
<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>js/ItemListEditor.class.js"></script>
<script type="text/javascript">
	//<![CDATA[
	function init() {
		<?php if (count($this->v['boards']) > 0 && count($this->v['boards']) < 100 && $this->v['this']->user->getPermission('admin.board.canEditBoard')) { ?>
			new ItemListEditor('boardList', { itemTitleEdit: true, itemTitleEditURL: 'index.php?action=BoardRename&boardID=', tree: true, treeTag: 'ol' });
		<?php } ?>
	}
	
	// when the dom is fully loaded, execute these scripts
	document.observe("dom:loaded", init);	
	
	function openCategory(boardID) {
		var element = $('parentItem_' + boardID);
		var close = 0;
		if (element.visible()) {
			// close list
			Effect.BlindUp(element, { duration: 0.2 });
			close = 1;
			var image = $('category' + boardID + 'Image');
			if (image) {
				image.src = image.src.replace(/minus/, 'plus');
			}
		}
		else {
			// open list
			Effect.BlindDown(element, { duration: 0.2 });
			var image = $('category' + boardID + 'Image');
			if (image) {
				image.src = image.src.replace(/plus/, 'minus');
			}
		}
		
		// save status
		var ajaxRequest = new AjaxRequest();
		ajaxRequest.openPost('index.php?action=BoardCategoryClose' + SID_ARG_2ND, 'boardID=' + encodeURIComponent(boardID) + '&close=' + encodeURIComponent(close));
	}
	
	//]]>
</script>

<div class="mainHeadline">
	<img src="<?php echo RELATIVE_WBB_DIR; ?>icon/boardL.png" alt="" />
	<div class="headlineContainer">
		<h2>Foren</h2>
	</div>
</div>

<?php if ($this->v['deletedBoardID']) { ?>
	<p class="success">Das Forum wurde erfolgreich gelöscht.</p>	
<?php } ?>

<?php if ($this->v['successfulSorting']) { ?>
	<p class="success">Die Foren wurden erfolgreich sortiert.</p>	
<?php } ?>

<?php if ($this->v['this']->user->getPermission('admin.board.canAddBoard')) { ?>
	<div class="contentHeader">
		<div class="largeButtons">
			<ul><li><a href="index.php?form=BoardAdd&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Forum hinzufügen"><img src="<?php echo RELATIVE_WBB_DIR; ?>icon/boardAddM.png" alt="" /> <span>Forum hinzufügen</span></a></li></ul>
		</div>
	</div>
<?php } ?>

<?php if (count($this->v['boards']) > 0) { ?>
	<?php if ($this->v['this']->user->getPermission('admin.board.canEditBoard')) { ?>
	<form method="post" action="index.php?action=BoardSort">
	<?php } ?>
		<div class="border content">
			<div class="container-1">
				<ol class="itemList" id="boardList">
					<?php
if (count($this->v['boards']) > 0) {
foreach ($this->v['boards'] as $this->v['child']) {
?>
						
						<?php $this->assign("board", $this->v['child']['board']); ?>
						
						<li id="item_<?php echo $this->v['board']->boardID; ?>" class="deletable">
							<div class="buttons">
								<?php if ($this->v['this']->user->getPermission('admin.board.canEditBoard') || $this->v['this']->user->getPermission('admin.board.canEditPermissions') || $this->v['this']->user->getPermission('admin.board.canEditModerators')) { ?>
									<a href="index.php?form=BoardEdit&amp;boardID=<?php echo $this->v['board']->boardID; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/editS.png" alt="" title="Forum bearbeiten" /></a>
								<?php } else { ?>
									<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/editDisabledS.png" alt="" title="Forum bearbeiten" />
								<?php } ?>
								<?php if ($this->v['this']->user->getPermission('admin.board.canAddBoard')) { ?>
									<a href="index.php?form=BoardAdd&amp;parentID=<?php echo $this->v['board']->boardID; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Forum hinzufügen"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/addS.png" alt="" /></a>
								<?php } else { ?>
									<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/addDisabledS.png" alt="" title="Forum hinzufügen" />
								<?php } ?>								
								<?php if ($this->v['this']->user->getPermission('admin.board.canDeleteBoard')) { ?>
									<a href="index.php?action=BoardDelete&amp;boardID=<?php echo $this->v['board']->boardID; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Forum löschen" class="deleteButton"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/deleteS.png" alt="" longdesc="Wollen Sie dieses Forum wirklich löschen?"  /></a>
								<?php } else { ?>
									<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/deleteDisabledS.png" alt="" title="Forum löschen" />
								<?php } ?>
								
								<?php if (isset($this->v['child']['additionalButtons'])) { ?><?php echo $this->v['child']['additionalButtons']; ?><?php } ?>
							</div>
							
							<h3 class="itemListTitle<?php if ($this->v['board']->isCategory()) { ?> itemListCategory<?php } ?>">
								<?php if ($this->v['board']->isCategory()) { ?>
									<?php if ($this->v['child']['open']) { ?>
										<a onclick="openCategory(<?php echo $this->v['board']->boardID; ?>)"><img id="category<?php echo $this->v['board']->boardID; ?>Image" src="<?php echo RELATIVE_WCF_DIR; ?>icon/minusS.png" alt="" title="" /></a>
									<?php } else { ?>
										<a onclick="openCategory(<?php echo $this->v['board']->boardID; ?>)"><img id="category<?php echo $this->v['board']->boardID; ?>Image" src="<?php echo RELATIVE_WCF_DIR; ?>icon/plusS.png" alt="" title="" /></a>
									<?php } ?>
								<?php } else { ?>
									<img src="<?php echo RELATIVE_WBB_DIR; ?>icon/<?php if ($this->v['board']->isBoard()) { ?>board<?php } else { ?>boardRedirect<?php } ?>S.png" alt="" title="<?php $this->tagStack[] = array('lang', array()); ob_start(); ?>wbb.acp.board.boardType.<?php echo $this->v['board']->boardType; ?><?php $_lange70d7d97134e41a0ff812ef8902ee5929d99efbd = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lange70d7d97134e41a0ff812ef8902ee5929d99efbd, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?>" />
								<?php } ?>
								
								<?php if ($this->v['this']->user->getPermission('admin.board.canEditBoard')) { ?>
									<select name="boardListPositions[<?php echo $this->v['board']->boardID; ?>][<?php echo $this->v['child']['parentID']; ?>]">
										<?php
if ($this->v['child']['maxPosition']) {
$this->v['tpl']['section']['positions'] = array();
$this->v['tpl']['section']['positions']['loop'] = (is_array($this->v['child']['maxPosition']) ? count($this->v['child']['maxPosition']) : max(0, (int)$this->v['child']['maxPosition']));
$this->v['tpl']['section']['positions']['show'] = 1;
$this->v['tpl']['section']['positions']['step'] = 1;
$this->v['tpl']['section']['positions']['max'] = $this->v['tpl']['section']['positions']['loop'];
$this->v['tpl']['section']['positions']['start'] = ($this->v['tpl']['section']['positions']['step'] > 0 ? 0 : $this->v['tpl']['section']['positions']['loop'] - 1);
$this->v['tpl']['section']['positions']['total'] = $this->v['tpl']['section']['positions']['loop'];
if ($this->v['tpl']['section']['positions']['total'] == 0) $this->v['tpl']['section']['positions']['show'] = false;
} else {
$this->v['tpl']['section']['positions']['total'] = 0;
$this->v['tpl']['section']['positions']['show'] = false;}
if ($this->v['tpl']['section']['positions']['show']) {
for ($this->v['tpl']['section']['positions']['index'] = $this->v['tpl']['section']['positions']['start'], $this->v['tpl']['section']['positions']['rowNumber'] = 1;
$this->v['tpl']['section']['positions']['rowNumber'] <= $this->v['tpl']['section']['positions']['total'];
$this->v['tpl']['section']['positions']['index'] += $this->v['tpl']['section']['positions']['step'], $this->v['tpl']['section']['positions']['rowNumber']++) {
$this->v['positions'] = $this->v['tpl']['section']['positions']['index'];
$this->v['tpl']['section']['positions']['previousIndex'] = $this->v['tpl']['section']['positions']['index'] - $this->v['tpl']['section']['positions']['step'];
$this->v['tpl']['section']['positions']['nextIndex'] = $this->v['tpl']['section']['positions']['index'] + $this->v['tpl']['section']['positions']['step'];
$this->v['tpl']['section']['positions']['first']      = ($this->v['tpl']['section']['positions']['rowNumber'] == 1);
$this->v['tpl']['section']['positions']['last']       = ($this->v['tpl']['section']['positions']['rowNumber'] == $this->v['tpl']['section']['positions']['total']);
?>
											<option value="<?php echo $this->v['positions']+1; ?>"<?php if ($this->v['positions']+1 == $this->v['child']['position']) { ?> selected="selected"<?php } ?>><?php echo $this->v['positions']+1; ?></option>
										<?php } } ?>
									</select>
								<?php } ?>
								
								ID-<?php echo $this->v['board']->boardID; ?> <a href="index.php?form=BoardEdit&amp;boardID=<?php echo $this->v['board']->boardID; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" class="title"><?php $this->tagStack[] = array('lang', array()); ob_start(); ?><?php echo StringUtil::encodeHTML($this->v['board']->title); ?><?php $_lang9a581b5cf34eb38bb47c300752aa9bb9bffeb866 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang9a581b5cf34eb38bb47c300752aa9bb9bffeb866, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?></a>
							</h3>
						
						<?php if ($this->v['child']['hasChildren']) { ?><ol id="parentItem_<?php echo $this->v['board']->boardID; ?>"<?php if ( ! $this->v['child']['open']) { ?> style="display: none"<?php } ?>><?php } else { ?><ol id="parentItem_<?php echo $this->v['board']->boardID; ?>"></ol></li><?php } ?>
						<?php if ($this->v['child']['openParents'] > 0) { ?><?php echo str_repeat("</ol></li>",$this->v['child']['openParents']); ?><?php } ?>
					<?php } } ?>
				</ol>
			</div>
		</div>
	<?php if ($this->v['this']->user->getPermission('admin.board.canEditBoard')) { ?>
		<div class="formSubmit">
			<input type="submit" accesskey="s" value="Absenden" />
			<input type="reset" accesskey="r" id="reset" value="Zurücksetzen" />
			<input type="hidden" name="packageID" value="<?php echo PACKAGE_ID; ?>" />
	 		<?php echo SID_INPUT_TAG; ?>
	 	</div>
	</form>
	<?php } ?>
<?php } else { ?>
	<div class="border content">
		<div class="container-1">
			<p>Derzeit sind keine Kategorien oder Foren vorhanden.</p>
		</div>
	</div>
<?php } ?>

<?php
$outerTemplateNamec2f042d1006577087b08da791cf38551ecc1cfdc = $this->v['tpl']['template'];
$this->includeTemplate('footer', array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateNamec2f042d1006577087b08da791cf38551ecc1cfdc;
$this->v['tpl']['includedTemplates']['footer'] = 1;
?>