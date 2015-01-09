//
//  FindsViewController.m
//  Stage
//
//  Created by Joubin Jabbari on 12/27/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "FindsViewController.h"

@implementation FindsViewController
- (instancetype)init
{
    self = [super init];
    if (self) {
        self.tableData = [[NSMutableDictionary alloc] init];
        self.refreshControl = [[UIRefreshControl alloc] init];
        [self.refreshControl addTarget:self action:@selector(handleRefresh) forControlEvents:UIControlEventValueChanged];
        self.tbl = [[UITableView alloc] initWithFrame:CGRectMake(0, 20, screenRect.size.width, screenRect.size.height-23)];
        [self.tbl setDataSource:self];
        [self.tbl setDelegate:self];
        [self.tbl addSubview:self.refreshControl];
        [self.view setBackgroundColor:[UIColor whiteColor]];
        [self.view addSubview:self.tbl];
        [self handleRefresh];
        [self.refreshControl beginRefreshing];
        self.tbl.layer.zPosition = 1;

    }
    return self;
}

#pragma tableview
- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section{
    return [self.tableData count];
}

- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath{
    static NSString *CellIdentifier = @"Cell";
    
    UITableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    if (cell == nil) {
        cell = [[UITableViewCell alloc] initWithStyle:UITableViewCellStyleDefault reuseIdentifier:CellIdentifier];
    }
    NSString *str = [[self.tableData allKeys] objectAtIndex:(int)indexPath.row];
    //    cell.textLabel.text = str;
    
    cell.backgroundColor = self.tbl.backgroundColor;
    //    cell.accessoryType = UITableViewCellAccessoryDisclosureIndicator;
    //    cell.frame = CGRectMake(0, 0, screenRect.size.width, 500);
    
    cell.textLabel.textAlignment = NSTextAlignmentCenter;
    [cell setFrame:CGRectMake(cell.frame.size.width/2, cell.frame.size.height/2, 100, 100)];
    [cell setBackgroundView:[[UIImageView alloc] initWithImage:[UIImage imageWithData:[NSData dataWithContentsOfURL:[NSURL URLWithString:[[[self.tableData objectForKey:str] getPFObject] objectForKey:@"Image"]]]]]];
    UILabel *view = [[UILabel alloc] init];
    [view setBackgroundColor:[UIColor colorWithRed:.5 green:.5 blue:.5 alpha:.5]];
    [view setText:str];
    [view sizeToFit];
    [view setFrame:CGRectMake(screenRect.size.width-view.frame.size.width, 0, view.frame.size.width, view.frame.size.height)];
    [view setTextColor:[UIColor whiteColor]];
    [cell addSubview:view];
    
    
    return cell;
}

- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath
{
    BandDetailedViewController *bvc = [[BandDetailedViewController alloc] initWithData:[_tableData objectForKey:[[self.tableData allKeys] objectAtIndex:(int)indexPath.row]]];
    
    [self presentViewController:bvc animated:YES completion:nil];
    
    [tableView deselectRowAtIndexPath:indexPath animated:YES];

}

- (CGFloat)tableView:(UITableView *)tableView heightForRowAtIndexPath:(NSIndexPath *)indexPath
{
    return 150;
}

-(void) handleRefresh{
    NSLog(@"getting data");
    [PFCloud callFunctionInBackground:@"isInVenue"
                       withParameters:@{@"lat": [[LocationManager sharedManager] getLatitude], @"lon": [[LocationManager sharedManager] getLongitude]}
                                block:^(NSArray *results, NSError *error) {
                                    if (!error) {
                                        [self.tableData removeAllObjects];
                                        NSMutableArray *bandIDS = [[NSMutableArray alloc] init];
                                        for (NSString *str in results) {
                                            PFObject *tmpObj = (PFObject *) str;
                                            [bandIDS addObject:[tmpObj objectForKey:@"Bands"]];
                                        }
                                        
                                        
                                        bandIDS = [[bandIDS valueForKeyPath: @"@unionOfArrays.self"] copy];
                                        NSLog(@" bandIDS %@", bandIDS);
                                        
                                        [PFCloud callFunctionInBackground:@"getBands" withParameters:@{@"idSet":bandIDS} block:^(NSArray *result2, NSError *error){
                                            for (NSString *str in result2) {
                                                PFObject *tmpObj = (PFObject *) str;
                                                NSString *bandName = [tmpObj objectForKey:@"BandName"];
                                                Band *band = [[Band alloc] initWithPFObject:tmpObj];
                                                _tableData[bandName] =  band;
                                                NSLog(@"%@",bandName);
                                            }
                                            [self.tbl reloadData];
                                            [self.refreshControl endRefreshing];
                                        }];
                                        
                                        
                                        
                                    }
                                }];
    
    
}


-(void) updateLocalList{
    NSArray *paths = NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES);
    NSString *documentsDirectory = [paths objectAtIndex:0];
    NSString *path = [documentsDirectory stringByAppendingPathComponent:@"allBands.plist"];
    NSMutableDictionary *dataFile = [NSMutableDictionary dictionaryWithContentsOfFile:path];
    if (dataFile == nil) {
        dataFile = [[NSMutableDictionary alloc] init];
        dataFile[@"Hi"] = @"bye";
        [dataFile writeToFile:path atomically:YES];
        NSLog(@"Did not find file, created");
    }else{
        NSLog(@"%@", dataFile);
    }

}


@end
