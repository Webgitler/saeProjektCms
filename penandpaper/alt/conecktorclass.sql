class ConnectorFactory{



public static function getConnector(DBType type){
      if(type == 'mysql'){
        return new MysqlConnector();
      }
      else if(type == 'mongo'){
        return new MongoDBConnector();
      }
      return new DBConnector();
}



class Application{
    //connector = new MySQLConnector();

    if(type == 'mysql'){
      return new MysqlConnector();
    }
    else if(type == 'mongo'){
      return new MongoDBConnector();
    }
    return new DBConnector();


    //tralalalaa
    // type = ??????
    connector = ConnectorFactory::getConnector(type);
    connector->connectToDB();
}
