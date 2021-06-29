ArrayList arList=null;
		        ArrayList al=null;
		        String fName = "C:/Users/ifs14/OneDrive/Documents/samplexl.xls";
		        String csvname = "C:/Users/ifs14/OneDrive/Documents/samplexl.csv";
		        StringBuffer data = new StringBuffer();
		        File inputFile = new File(fName);
		        File outputFile = new File(csvname);
		        try {
		            FileOutputStream fos = new FileOutputStream(outputFile);
		
		            FileInputStream fis = new FileInputStream(inputFile);
		            Workbook workbook = null;
		
		            String ext = FileNameUtils.getExtension(inputFile.toString());
		
		            if (ext.equalsIgnoreCase("xlsx")) {
		                workbook = new XSSFWorkbook(fis);
		            } else if (ext.equalsIgnoreCase("xls")) {
		                workbook = new HSSFWorkbook(fis);
		            }
		
		            int numberOfSheets = workbook.getNumberOfSheets();
		
		            Row row;
		            Cell cell;
		
		            for (int i = 0; i < numberOfSheets; i++) {
		                Sheet sheet = workbook.getSheetAt(0);
		                Iterator<Row> rowIterator = sheet.iterator();
		
		                while (rowIterator.hasNext()) {
		                    row = rowIterator.next();
		
		                    short firstCell = row.getFirstCellNum();
		                    short lastCell = row.getLastCellNum();
		
		                    String DELIMITER = "";
		
		                    for(int j = firstCell; j<lastCell; j++){
		                        cell = row.getCell(j);
		                        if(cell==null){
		                            data.append(DELIMITER);
		
		                        }else {
		                            switch (cell.getCellType()) {
		                                case BOOLEAN:
		                                    data.append(DELIMITER + cell.getBooleanCellValue() );
		
		                                    break;
		                                case NUMERIC:
		                                    data.append(DELIMITER + cell.getNumericCellValue() );
		
		                                    break;
		                                case STRING:
		                                    data.append(DELIMITER + cell.getStringCellValue());
		                                    break;
		
		                                case BLANK:
		                                    data.append(DELIMITER );
		                                    break;
		
		                                default:
		                                    data.append(DELIMITER + cell);
		                            }
		                        }
		                        DELIMITER=",";
		                    }
		                    data.append('\n'); //
		                }
		            }
		            fos.write(data.toString().getBytes());
		            fos.close();
		
		        } catch (Exception ioe) {
		            ioe.printStackTrace();
		        }
