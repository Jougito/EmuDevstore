<?php
/**
* WoltLab Community Framework
* Template: index
* Compiled at: Tue, 13 Aug 2013 11:10:44 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'index';
?>
<?php
if (!isset($this->pluginObjects['TemplatePluginFunctionCycle'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginFunctionCycle.class.php');
$this->pluginObjects['TemplatePluginFunctionCycle'] = new TemplatePluginFunctionCycle;
}
if (!isset($this->pluginObjects['TemplatePluginModifierTime'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginModifierTime.class.php');
$this->pluginObjects['TemplatePluginModifierTime'] = new TemplatePluginModifierTime;
}
?><?php
$outerTemplateName498be154c6b9c678d0aa4d84065a7062fa35d2da = $this->v['tpl']['template'];
$this->includeTemplate("documentHeader", array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName498be154c6b9c678d0aa4d84065a7062fa35d2da;
$this->v['tpl']['includedTemplates']["documentHeader"] = 1;
?>
<head>
	<title>Startseite - <?php $this->tagStack[] = array('lang', array()); ob_start(); ?><?php echo StringUtil::encodeHTML(PAGE_TITLE); ?><?php $_lang3d1eabf17b5e94d10bfdc5a651bc99d818192319 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang3d1eabf17b5e94d10bfdc5a651bc99d818192319, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?></title>
	
	<?php
$outerTemplateName6dbe0bd5b23f63eefb1d732af7aa50ecbdd323eb = $this->v['tpl']['template'];
$this->includeTemplate('headInclude', array(), (false ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName6dbe0bd5b23f63eefb1d732af7aa50ecbdd323eb;
$this->v['tpl']['includedTemplates']['headInclude'] = 1;
?>
	<link rel="alternate" type="application/rss+xml" href="index.php?page=ThreadsFeed&amp;format=rss2" title="Themen abonnieren (RSS2)" />
	<link rel="alternate" type="application/atom+xml" href="index.php?page=ThreadsFeed&amp;format=atom" title="Themen abonnieren (Atom)" />
</head>
<body<?php if (isset($this->v['templateName'])) { ?> id="tpl<?php echo StringUtil::encodeHTML(ucfirst($this->v['templateName'])); ?>"<?php } ?>>
<?php
$outerTemplateNamedab1c9651e107e7caaf984c508ef76a766b92ba0 = $this->v['tpl']['template'];
$this->includeTemplate('header', array(), (false ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateNamedab1c9651e107e7caaf984c508ef76a766b92ba0;
$this->v['tpl']['includedTemplates']['header'] = 1;
?>

<div id="main">
	
	<div class="mainHeadline">
		<img src="<?php echo StyleManager::getStyle()->getIconPath('indexL.png'); ?>" alt="" ondblclick="document.location.href=fixURL('index.php?action=BoardMarkAllAsRead&amp;t=<?php echo SECURITY_TOKEN; ?><?php echo SID_ARG_2ND; ?>')" title="Alle Foren als gelesen markieren" />
		<div class="headlineContainer">
			<h2><?php $this->tagStack[] = array('lang', array()); ob_start(); ?><?php echo StringUtil::encodeHTML(PAGE_TITLE); ?><?php $_lang0703b4ab7f189c13e3b8a8325c55620a4865248e = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang0703b4ab7f189c13e3b8a8325c55620a4865248e, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?></h2>
			<p><?php $this->tagStack[] = array('lang', array()); ob_start(); ?><?php echo StringUtil::encodeHTML(PAGE_DESCRIPTION); ?><?php $_langad3773bd5b8d45d5ac126d5233b23b07280f2627 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_langad3773bd5b8d45d5ac126d5233b23b07280f2627, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?></p>
		</div>
	</div>
	
	<?php if (isset($this->v['userMessages'])) { ?><?php echo $this->v['userMessages']; ?><?php } ?>
	
	<?php if (isset($this->v['additionalTopContents'])) { ?><?php echo $this->v['additionalTopContents']; ?><?php } ?>
	
	<?php
$outerTemplateName96f1bb36956e7fd6056c28327d1bd61018a73cd0 = $this->v['tpl']['template'];
$this->includeTemplate("boardList", array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName96f1bb36956e7fd6056c28327d1bd61018a73cd0;
$this->v['tpl']['includedTemplates']["boardList"] = 1;
?>
	
	<?php if (isset($this->v['usersOnlineTotal']) || INDEX_ENABLE_STATS || isset($this->v['additionalBoxes']) || count($this->v['tags'])) { ?>
		<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array('values' => 'container-1,container-2', 'print' => false, 'advance' => false), $this); ?>
		<div class="border infoBox">
			<?php if (isset($this->v['usersOnlineTotal'])) { ?>
				<div class="<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array(), $this); ?> infoBoxUsersOnline">
					<div class="containerIcon"> <img src="<?php echo StyleManager::getStyle()->getIconPath('membersM.png'); ?>" alt="" /></div>
					<div class="containerContent">
						<h3><?php if ($this->v['this']->user->getPermission('user.usersOnline.canView')) { ?><a href="index.php?page=UsersOnline<?php echo SID_ARG_2ND; ?>">Zurzeit <?php if ($this->v['usersOnlineTotal'] == 1) { ?>ist<?php } else { ?>sind<?php } ?> <?php echo StringUtil::formatNumeric($this->v['usersOnlineTotal']); ?> Benutzer online:</a><?php } else { ?>Zurzeit <?php if ($this->v['usersOnlineTotal'] == 1) { ?>ist<?php } else { ?>sind<?php } ?> <?php echo StringUtil::formatNumeric($this->v['usersOnlineTotal']); ?> Benutzer online:<?php } ?></h3> 
						<p class="smallFont">
<?php if ($this->v['usersOnlineMembers'] > 0) { ?>
	<?php echo StringUtil::formatNumeric($this->v['usersOnlineMembers']); ?> Mitglied<?php if ($this->v['usersOnlineMembers'] != 1) { ?>er<?php } ?>
<?php } ?> 
<?php if ($this->v['usersOnlineInvisible'] > 0) { ?>
	(davon <?php echo StringUtil::formatNumeric($this->v['usersOnlineInvisible']); ?> unsichtbar)
<?php } ?>
<?php if ($this->v['usersOnlineGuests'] > 0 && $this->v['usersOnlineMembers'] > 0) { ?>und<?php } ?>
<?php if ($this->v['usersOnlineGuests'] > 0) { ?>
	<?php echo StringUtil::formatNumeric($this->v['usersOnlineGuests']); ?> Besucher
<?php } ?> <?php if (USERS_ONLINE_RECORD > 0) { ?>- Rekord: <?php echo StringUtil::formatNumeric(USERS_ONLINE_RECORD); ?> Benutzer (<?php echo $this->pluginObjects['TemplatePluginModifierTime']->execute(array(USERS_ONLINE_RECORD_TIME), $this); ?>)<?php } ?></p>
						<?php if (count($this->v['usersOnline'])) { ?>
							<p class="smallFont">
							<?php
$_length026afd5afe7f382d1329fcf973316055d1593909 = count($this->v['usersOnline']);
$_i026afd5afe7f382d1329fcf973316055d1593909 = 0;
foreach ($this->v['usersOnline'] as $this->v['userOnline']) { ?><a href="index.php?page=User&amp;userID=<?php echo $this->v['userOnline']['userID']; ?><?php echo SID_ARG_2ND; ?>"><?php echo $this->v['userOnline']['username']; ?></a><?php
if (++$_i026afd5afe7f382d1329fcf973316055d1593909 < $_length026afd5afe7f382d1329fcf973316055d1593909) { echo ', '; }
} ?>
							</p>
							<?php if (INDEX_ENABLE_USERS_ONLINE_LEGEND && count($this->v['usersOnlineMarkings'])) { ?>
								<p class="smallFont">
								Legende: <?php
$_length3c4e332edcd469b2f980cd01f2ba8b9d45c8ce5d = count($this->v['usersOnlineMarkings']);
$_i3c4e332edcd469b2f980cd01f2ba8b9d45c8ce5d = 0;
foreach ($this->v['usersOnlineMarkings'] as $this->v['usersOnlineMarking']) { ?><?php echo $this->v['usersOnlineMarking']; ?><?php
if (++$_i3c4e332edcd469b2f980cd01f2ba8b9d45c8ce5d < $_length3c4e332edcd469b2f980cd01f2ba8b9d45c8ce5d) { echo ', '; }
} ?>
								</p>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
			
			<?php if (INDEX_ENABLE_STATS) { ?>
				<div class="<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array(), $this); ?> infoBoxStatistics">
					<div class="containerIcon"><img src="<?php echo StyleManager::getStyle()->getIconPath('statisticsM.png'); ?>" alt="" /></div>
					<div class="containerContent">
						<h3>Statistik:</h3> 
						<p class="smallFont"><?php echo StringUtil::formatNumeric($this->v['stats']['members']); ?> Mitglied<?php if ($this->v['stats']['members'] != 1) { ?>er<?php } ?> - <?php echo StringUtil::formatNumeric($this->v['stats']['threads']); ?> <?php if ($this->v['stats']['threads'] == 1) { ?>Thema<?php } else { ?>Themen<?php } ?> - <?php echo StringUtil::formatNumeric($this->v['stats']['posts']); ?> <?php if ($this->v['stats']['posts'] == 1) { ?>Beitrag<?php } else { ?>Beiträge<?php } ?> (<?php echo StringUtil::formatNumeric($this->v['stats']['postsPerDay']); ?> <?php if ($this->v['stats']['postsPerDay'] == 1) { ?>Beitrag<?php } else { ?>Beiträge<?php } ?> pro Tag)<br />
Unser neuestes Mitglied heißt: <a href="index.php?page=User&amp;userID=<?php echo $this->v['stats']['newestMember']->userID; ?><?php echo SID_ARG_2ND; ?>"><?php echo StringUtil::encodeHTML($this->v['stats']['newestMember']->username); ?></a>.</p>
					</div>
				</div>
			<?php } ?>
			
			<?php if (isset($this->v['additionalBoxes'])) { ?><?php echo $this->v['additionalBoxes']; ?><?php } ?>
			
			<?php if (count($this->v['tags'])) { ?>
				<div class="<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array(), $this); ?> infoBoxTags">
					<div class="containerIcon"><img src="<?php echo StyleManager::getStyle()->getIconPath('tagM.png'); ?>" alt="" /></div>
					<div class="containerContent">
						<h3><a href="index.php?page=TaggedObjects<?php echo SID_ARG_2ND; ?>">Die beliebtesten Tags</a></h3>
						<?php
$outerTemplateName0ab40bea2f953b53b7408423b124c81bacccbc34 = $this->v['tpl']['template'];
$this->includeTemplate('tagCloud', array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName0ab40bea2f953b53b7408423b124c81bacccbc34;
$this->v['tpl']['includedTemplates']['tagCloud'] = 1;
?>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
	<div class="pageOptions">
		<?php if (isset($this->v['additionalPageOptions'])) { ?><?php echo $this->v['additionalPageOptions']; ?><?php } ?>
		<a href="index.php?action=BoardMarkAllAsRead&amp;t=<?php echo SECURITY_TOKEN; ?><?php echo SID_ARG_2ND; ?>"><img src="<?php echo StyleManager::getStyle()->getIconPath('boardMarkAsReadS.png'); ?>" alt="" /> <span>Alle Foren als gelesen markieren</span></a>
	</div>
</div>

<?php
$outerTemplateName61948952f26580aa5bbd5cd92c30222d4a4b8772 = $this->v['tpl']['template'];
$this->includeTemplate('footer', array(), (false ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName61948952f26580aa5bbd5cd92c30222d4a4b8772;
$this->v['tpl']['includedTemplates']['footer'] = 1;
?>

</body>
</html>