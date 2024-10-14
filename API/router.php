<?php
$app = new \Slim\App();

$app->post('/api/agap_members', 'createMember');
$app->get('/api/agap_members', 'getMembers');
$app->get('/api/agap_members/:id', 'getMember');
$app->put('/api/agap_members/:id', 'updateMember');
$app->delete('/api/agap_members/:id', 'deleteMember');

$app->run();
?>