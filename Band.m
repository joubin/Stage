//
//  Band.m
//  Stage
//
//  Created by Joubin Jabbari on 12/25/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "Band.h"


@implementation Band{
    PFObject *data;
    
}
NSString * const MUSICDIRECTORY = @"music-directory";
NSString * const BANDNAME = @"BandName";
NSString * const SONGLIST = @"song-list";

-(id) initWithPFObject:(PFObject *)obj{
    self = [super init];
    if (self) {
        data = obj;
        [self readArraysFromFile];
        

        
    }
    return self;
}

-(void)readArraysFromFile{
    NSArray *paths = NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES);
    NSString *documentsDirectory = [paths objectAtIndex:0];
    NSString *path = [documentsDirectory stringByAppendingPathComponent:[self bandID]];
    self.dataFile = [NSMutableDictionary dictionaryWithContentsOfFile:path];
    if (_dataFile == nil) {
        _dataFile = [[NSMutableDictionary alloc] init];
        _dataFile[MUSICDIRECTORY] = [NSString stringWithFormat:@"%@-music", [self bandID]];
        [_dataFile writeToFile:path atomically:YES];
        [_dataFile writeToFile:[_dataFile[MUSICDIRECTORY] stringByAppendingPathComponent:@"asdasd.123"] atomically:YES];

        NSLog(@"Did not find file, created");
        [FileManager createDirectory:[NSString stringWithFormat:@"%@-music", [self bandID]] atFilePath:documentsDirectory];
    }else{
       
    }
}

-(void) writeDataToFile{
    NSArray *paths = NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES);
    NSString *documentsDirectory = [paths objectAtIndex:0];
    NSString *path = [documentsDirectory stringByAppendingPathComponent:[self bandID]];
    if (_dataFile == nil) {
        return;
    }
    [_dataFile writeToFile:path atomically:YES];

}

- (NSString *) bandID{
    return [data objectId];
}

-(NSString *) getMusicDir{
    return _dataFile[MUSICDIRECTORY];
}


-(void) addMusicWithURL:(NSString *) albumURL{
    [FileManager downloadingLecture:_dataFile[MUSICDIRECTORY] withFileName:[[albumURL componentsSeparatedByString:@"/"] lastObject] withLectureUrl:albumURL];
}

-(void) addMusicToBandsCollection:(PFObject *) object{
    if(self.songList == nil)
        self.songList = [[NSMutableArray alloc] init];
    if ([[self.dataFile allKeys] containsObject:SONGLIST])
        self.songList =  self.dataFile[SONGLIST];
    //    self.songList addObject:
    Song *song = [[Song alloc] initWithPFObject:object];
    [self.songList addObject:song];
    self.dataFile[SONGLIST] = self.songList;
    [self writeDataToFile];
}

-(PFObject *)getPFObject{
    return data;
}

@end
