//
//  FileManager.m
//  Stage
//
//  Created by Joubin Jabbari on 12/29/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "FileManager.h"
#import "Band.h"



@implementation FileManager{
    
}
+(void)createDirectory:(NSString *)directoryName atFilePath:(NSString *)filePath
{
    NSString *filePathAndDirectory = [filePath stringByAppendingPathComponent:directoryName];
    NSError *error;
    
    if (![[NSFileManager defaultManager] createDirectoryAtPath:filePathAndDirectory
                                   withIntermediateDirectories:NO
                                                    attributes:nil
                                                         error:&error])
    {
        NSLog(@"Create directory error: %@", error);
    }
}


+ (NSArray *)scanPath:(NSString *) sPath {
    
    BOOL isDir;
    
    [[NSFileManager defaultManager] fileExistsAtPath:sPath isDirectory:&isDir];
    NSMutableArray *results = [[NSMutableArray alloc] init];

    if(isDir)
    {
        NSArray *contentOfDirectory=[[NSFileManager defaultManager] contentsOfDirectoryAtPath:sPath error:NULL];
        for (NSString *fileName in contentOfDirectory) {
            [results addObject:[sPath stringByAppendingFormat:@"%@%@",@"/",fileName]];
            if([[NSFileManager defaultManager] isDeletableFileAtPath:[results lastObject]])
            {
                [self scanPath:[results lastObject]];
            }
        }
        
    }
    return results;
}

+ (void)downloadingLecture:(NSString *)folder withFileName:(NSString *)fileName withLectureUrl:(NSString *)someUrl
{
    dispatch_async(dispatch_get_main_queue(), ^{

        
        NSData *pageContents = [NSData dataWithContentsOfURL: [NSURL URLWithString:someUrl]];

        if ( pageContents )
        {
            NSArray       *paths = NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES);
            NSString  *documentsDirectory = [paths objectAtIndex:0];
            
            NSString  *filePath = [NSString stringWithFormat:@"%@/%@/%@", documentsDirectory,folder, fileName];
            NSLog(@"%@", filePath);
            [pageContents writeToFile:filePath atomically:YES];

            
    
        }
    });
}
@end
