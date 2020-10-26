function serializeArrayToJson(array) {
  const json = {};
  array.map((obj) => {
	json[obj.name] = obj.value;
  });
  return json; 
}
