
var assert = require('assert');

describe('sql parser', function() {
    
  describe('select everything', function() {
    it('should return empty', function() {
      assert.deepEqual(parse('SELECT * FROM mytable'), {});
    });
  });
  
  describe('select everything', function() {
    it('should return empty', function() {
      assert.deepEqual(parse('SELECT * FROM mytable WHERE id = 2'), {id: 2});
    });
  });
  
  function parse(sql){
      return {};
  }
});