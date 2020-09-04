<?php
$pageTitle = __('Search');
$totals =  __('%s results', $total_results);
echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
$searchRecordTypes = get_search_record_types();
?>

<div class="row cofcAccent z-depth-2">
<div class="container">
<div class="col s12">
        <p id="simple-pages-breadcrumbs"><a href="/">Home</a> &gt; Search LDHI</p>
    </div>
</div>
</div>


<div class="row">
<div class="col s12">
<div class="container">

<h1><?php echo $pageTitle; ?></h1>

<div class="row center-align">
<form id="search-form" name="search-form" role="search" class="form" action="/search" method="get" _lpchecked="1">    
<input type="text" name="query" id="query" value="" title="Search" style="width:80%;">            
<input type="hidden" name="query_type" value="keyword" id="query_type">                
<input type="hidden" name="record_types[]" value="Exhibit" id="record_types">                
<input type="hidden" name="record_types[]" value="ExhibitPage" id="record_types">                
<button name="submit_search" id="submit_search" class="btn red darken-5 waves-effect waves-light" type="submit" value="Search">Search</button>
</form>
</div>

<?php if ($total_results): ?>

<h3><?php echo $totals; ?></h3>

<table id="search-results">
    <thead>
        <tr>
            <th><?php echo __('Record Type');?></th>
            <th><?php echo __('Title');?></th>
        </tr>
    </thead>
    <tbody>
        <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
        <?php foreach (loop('search_texts') as $searchText): ?>
        <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
        <?php $recordType = $searchText['record_type']; ?>
        <?php set_current_record($recordType, $record); ?>
        <tr class="<?php echo strtolower($filter->filter($recordType)); ?>">
            <td>
                <?php echo $searchRecordTypes[$recordType]; ?>
            </td>
            <td>
                <a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php echo pagination_links(); ?>
<?php else: ?>
<div id="no-results">
    <p><?php echo __('Your query returned no results.');?></p>
</div>
<?php endif; ?>

</div>
</div>
</div>

<?php echo foot(); ?>
