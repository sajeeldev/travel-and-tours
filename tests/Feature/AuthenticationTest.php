<?php

test('Successful', function () {
    $response = $this->get('/api/users');

    $response->assertStatus(200);
});
