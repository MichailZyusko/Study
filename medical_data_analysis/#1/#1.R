path <- paste0(getwd(), "/#1")
# setwd(path)


txt2table <- function(path) {
  tb <- read.table(path)
  return(tb)
}