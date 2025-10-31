export const getApiUrl = (url) => {
  return 'http://' + (`localhost:8060/api/${url}`.replace('//', '/'))
}
